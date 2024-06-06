<template>
<div>
    <div v-if="notification.show" class="notification">
        {{ notification.message }}
      </div>
    <!-- Shop Start -->
    <div class="row px-xl-5">
        <!-- Shop Product Start -->
        <div class="container-fluid pt-5">
            <div class="row px-xl-5 pb-3">
                <div v-for="product in products" :key="product.id" class="col-lg-3 col-md-6 col-sm-12 pb-1">
                    <div class="card product-item border-0 mb-4">
                        <div class="card-header product-img position-relative overflow-hidden bg-transparent border p-0">
                            <img class="img-fluid w-100" :src="product.image" alt="">
                        </div>
                        <div class="card-body border-left border-right text-center p-0 pt-4 pb-3">
                            <h6 class="text-truncate mb-3">{{ product.name }}</h6>
                            <div class="d-flex justify-content-center">
                                <h6>{{ product.price }} ₽</h6>
                            </div>
                        </div>
                        <div class="card-footer d-flex justify-content-between bg-light border">
                            <router-link :to="{name: 'product-show', params: {id: product.id}}"><a class="btn btn-sm text-dark p-0"><i class="fas fa-eye text-primary mr-1"></i>Подробно</a></router-link>
                            <a @click.prevent="addToCart(product)" class="btn btn-sm text-dark p-0"><i class="fas fa-shopping-cart text-primary mr-1"></i>Добавить</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Shop Product End -->
    </div>
</div>
<!-- Shop End -->

</template>

<script>
export default {
    name:"product-index",
    mounted() {
        this.getProducts()
    },

    data(){
        return {
            products: [],
            notification: {
            show: false,
            message: ''
            }
        }
    },

    methods: {
        getProducts() {
            this.axios.get('http://127.0.0.1:8000/api/products')
            .then(res=> {
                this.products = res.data.data

            })
        },

        addToCart(product) {
            let cart = localStorage.getItem('cart')
            let newProduct = [
                {
                    'id': product.id,
                    'name': product.name,
                    'price': product.price,
                    'image': product.image,
                    'qty': 1
                }
            ]
            if(!cart){
            localStorage.setItem('cart', JSON.stringify(newProduct))
            }
            else{
                cart = JSON.parse(cart)
                cart.forEach(productInCart => {
                    if (productInCart.id === product.id) {
                        productInCart.qty = Number(productInCart.qty) + 1
                        newProduct = null;
                    }
                })
                Array.prototype.push.apply(cart, newProduct)
                localStorage.setItem('cart', JSON.stringify(cart))
                this.showNotification(`Товар "${product.name}" добавлен в корзину`);
            }
        },  
        showNotification(message) {
            this.notification.message = message;
            this.notification.show = true;
            setTimeout(() => {
                this.notification.show = false;}, 3000); 
        }
    }

}
</script>

<style scoped>
.notification {
    position: fixed;
    top: 20px;
    right: 50px;
    padding: 10px 20px;
    background-color: #d19c97;
    color: white;
    border-radius: 5px;
    box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
    z-index: 1000;
}
</style>
