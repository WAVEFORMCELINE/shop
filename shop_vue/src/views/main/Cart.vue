<template>
    <div v-if="products.length" class="container-fluid pt-5">
        <div class="row px-xl-5">
            <div class="col-lg-8 table-responsive mb-5">
                <table class="table table-bordered text-center mb-0">
                    <thead class="bg-secondary text-dark">
                        <tr>
                            <th>Продукт</th>
                            <th>Цена</th>
                            <th>Количество</th>
                            <th>Стоимость</th>
                            <th>Удалить</th>
                        </tr>
                    </thead>
                    <tbody class="align-middle">
                        <tr v-for="product in products">
                            <td class="align-middle"><img :src="product.image" :alt="product.name" style="width: 50px;"><router-link :to="{name: 'product-show', params: {id: product.id}}">{{ product.name }} </router-link></td>
                            <td class="align-middle"> {{ product.price }} ₽</td>
                            <td class="align-middle">
                                <div class="input-group quantity mx-auto" style="width: 100px;">
                                    <div class="input-group-btn">
                                        <button @click.prevent="decreaseCartQuantity(product)" class="btn btn-sm btn-primary btn-minus" >
                                        <i class="fa fa-minus"></i>
                                        </button>
                                    </div>
                                    <input type="text" class="form-control form-control-sm bg-secondary text-center" :value="product.qty">
                                    <div class="input-group-btn">
                                        <button @click.prevent="increaseCartQuantity(product)" class="btn btn-sm btn-primary btn-plus">
                                            <i class="fa fa-plus"></i>
                                        </button>
                                    </div>
                                </div>
                            </td>
                            <td class="align-middle"> {{ (product.price*product.qty).toFixed(2) }} ₽</td>
                            <td class="align-middle"><button @click.prevent="removeCartProduct(product.id)" class="btn btn-sm btn-primary"><i class="fa fa-times"></i></button></td>
                        </tr>
                    </tbody>
                </table>
            </div>
            <div class="col-lg-4">
                <div class="input-group mb-5">
                    <input type="text" v-model="order.user_name" class="form-control p-4" placeholder="Ваше имя">
                </div>
                <div class="input-group mb-5">
                    <input type="text" v-model="order.user_email" class="form-control p-4" placeholder="Ваш E-mail">
                </div>
                <div class="card border-secondary mb-5">
                    <div class="card-header bg-secondary border-0">
                        <h4 class="font-weight-semi-bold m-0">Общая стоимость заказа</h4>
                    </div>
                    <div class="card-body">
                        <div class="d-flex justify-content-between mb-3 pt-1">
                            <h6 class="font-weight-medium">Стоимость товара</h6>
                            <h6 class="font-weight-medium">{{ calculateCartTotal().toFixed(2) }} ₽</h6>
                        </div>
                        <div class="d-flex justify-content-between">
                            <h6 class="font-weight-medium">Доставка</h6>
                            <h6 class="font-weight-medium">300 ₽</h6>
                        </div>
                    </div>
                    <div class="card-footer border-secondary bg-transparent">
                        <div class="d-flex justify-content-between mt-2">
                            <h5 class="font-weight-bold">Итого</h5>
                            <h5 class="font-weight-bold">{{ (calculateCartTotal()+300).toFixed(2) }} ₽</h5>
                        </div>
                        <button @click.prevent="submitOrder()" class="btn btn-block btn-primary my-3 py-3">Оформить заказ</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div v-else>
        Корзина пуста
    </div>

</template>

<script>
export default {
    name:"main-cart",
    mounted() {
        this.getCartProducts()
    },

    data(){
        return {
            order: {
            user_name: '',
            user_email: '',
            products: []
        },
        products: [],
        }
    },
    methods: {
        getCartProducts() {
            this.products = JSON.parse(localStorage.getItem('cart'))
        },
        
        calculateCartTotal(){
            let total = 0;
            this.products.forEach((item, i) => {
                total += item.price * item.qty;
            });
            return total;
        },

        increaseCartQuantity(product){
            if (product.qty >= 5) return 
            product.qty++
            this.updateCart()
        },

        decreaseCartQuantity(product){
            if (product.qty === 1) return 
            product.qty--
            this.updateCart()
            $(document).trigger('changed')
        },

        removeCartProduct(id){
        this.products = this.products.filter( product => {
            return product.id !== id
        })
        this.updateCart()
        },

        updateCart(){
            localStorage.setItem('cart', JSON.stringify(this.products))
        },

        async submitOrder() {
        try {
            this.order.products = this.products
            await this.axios.post('http://127.0.0.1:8000/api/orders', this.order);
            alert('Заказ оформлен');
            localStorage.removeItem('cart'); // Очистка корзины после успешной отправки заказа
            this.order = { user_name: '', user_email: '', products: [] };
            this.$router.push('/') 
        } catch (error) {
            console.error(error);
            alert('Ошибка оформления заказа');
        }
        }

    }
}
</script>

<style scoped>
</style>