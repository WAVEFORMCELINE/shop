<template>
    <div>
        <div v-if="notification.show" class="notification">
            {{ notification.message }}
          </div>
        <div class="container-fluid py-5">
            <div class="row px-xl-5">
                <div class="col-lg-5 pb-5">
                    <div class="card-header product-img position-relative overflow-hidden bg-transparent border p-0">
                        <img class="img-fluid w-100" :src="product.image" alt="">
                    </div>
                </div>
    
                <div class="col-lg-7 pb-5">
                    <h3 class="font-weight-semi-bold">{{ product.name }}</h3>
   
                    <p class="mb-4">Volup erat ipsum diam elitr rebum et dolor. Est nonumy elitr erat diam stet sit clita ea. Sanc invidunt ipsum et, labore clita lorem magna lorem ut. Erat lorem duo dolor no sea nonumy. Accus labore stet, est lorem sit diam sea et justo, amet at lorem et eirmod ipsum diam et rebum kasd rebum.</p>

                    <h3 class="font-weight-semi-bold mb-4">{{ product.price }} ₽</h3>
                    <div class="d-flex align-items-center mb-4 pt-2">
                        <!-- <div class="input-group quantity mr-3" style="width: 130px;">
                            <div class="input-group-btn">
                                <button class="btn btn-primary btn-minus" >
                                <i class="fa fa-minus"></i>
                                </button>
                            </div>
                            <input type="text" class="form-control bg-secondary text-center" value="1">
                            <div class="input-group-btn">
                                <button class="btn btn-primary btn-plus">
                                    <i class="fa fa-plus"></i>
                                </button>
                            </div>
                        </div> -->
                        
                        <button @click.prevent="addToCart(product)" class="btn btn-primary px-3"><i class="fa fa-shopping-cart mr-1"></i> Добавить в корзину</button>
                    </div>
                    <!-- <div class="d-flex pt-2">
                        <p class="text-dark font-weight-medium mb-0 mr-2">Поделиться:</p>
                        <div class="d-inline-flex">
                            <a class="text-dark px-2" href="">
                                <i class="fab fa-facebook-f"></i>
                            </a>
                            <a class="text-dark px-2" href="">
                                <i class="fab fa-twitter"></i>
                            </a>
                            <a class="text-dark px-2" href="">
                                <i class="fab fa-linkedin-in"></i>
                            </a>
                            <a class="text-dark px-2" href="">
                                <i class="fab fa-pinterest"></i>
                            </a>
                        </div>
                    </div> -->
                </div>
            </div>
            <div class="row px-xl-5">
                <div class="col">
                    <div class="nav nav-tabs justify-content-center border-secondary mb-4">
                        <a class="nav-item nav-link active" data-toggle="tab" href="#tab-pane-1">Описание</a>
                        <a class="nav-item nav-link" data-toggle="tab" href="#tab-pane-2">Информация</a>
                    </div>
                    <div class="tab-content">
                        <div class="tab-pane fade show active" id="tab-pane-1">
                            <h4 class="mb-3">Описание</h4>
                            <p>Eos no lorem eirmod diam diam, eos elitr et gubergren diam sea. Consetetur vero aliquyam invidunt duo dolores et duo sit. Vero diam ea vero et dolore rebum, dolor rebum eirmod consetetur invidunt sed sed et, lorem duo et eos elitr, sadipscing kasd ipsum rebum diam. Dolore diam stet rebum sed tempor kasd eirmod. Takimata kasd ipsum accusam sadipscing, eos dolores sit no ut diam consetetur duo justo est, sit sanctus diam tempor aliquyam eirmod nonumy rebum dolor accusam, ipsum kasd eos consetetur at sit rebum, diam kasd invidunt tempor lorem, ipsum lorem elitr sanctus eirmod takimata dolor ea invidunt.</p>
                            <p>Dolore magna est eirmod sanctus dolor, amet diam et eirmod et ipsum. Amet dolore tempor consetetur sed lorem dolor sit lorem tempor. Gubergren amet amet labore sadipscing clita clita diam clita. Sea amet et sed ipsum lorem elitr et, amet et labore voluptua sit rebum. Ea erat sed et diam takimata sed justo. Magna takimata justo et amet magna et.</p>
                        </div>
                        <div class="tab-pane fade" id="tab-pane-2">
                            <h4 class="mb-3">Additional Information</h4>
                            <p>Eos no lorem eirmod diam diam, eos elitr et gubergren diam sea. Consetetur vero aliquyam invidunt duo dolores et duo sit. Vero diam ea vero et dolore rebum, dolor rebum eirmod consetetur invidunt sed sed et, lorem duo et eos elitr, sadipscing kasd ipsum rebum diam. Dolore diam stet rebum sed tempor kasd eirmod. Takimata kasd ipsum accusam sadipscing, eos dolores sit no ut diam consetetur duo justo est, sit sanctus diam tempor aliquyam eirmod nonumy rebum dolor accusam, ipsum kasd eos consetetur at sit rebum, diam kasd invidunt tempor lorem, ipsum lorem elitr sanctus eirmod takimata dolor ea invidunt.</p>
                            <div class="row">
                                <div class="col-md-6">
                                    <ul class="list-group list-group-flush">
                                        <li class="list-group-item px-0">
                                            Sit erat duo lorem duo ea consetetur, et eirmod takimata.
                                        </li>
                                        <li class="list-group-item px-0">
                                            Amet kasd gubergren sit sanctus et lorem eos sadipscing at.
                                        </li>
                                        <li class="list-group-item px-0">
                                            Duo amet accusam eirmod nonumy stet et et stet eirmod.
                                        </li>
                                        <li class="list-group-item px-0">
                                            Takimata ea clita labore amet ipsum erat justo voluptua. Nonumy.
                                        </li>
                                      </ul> 
                                </div>
                                <div class="col-md-6">
                                    <ul class="list-group list-group-flush">
                                        <li class="list-group-item px-0">
                                            Sit erat duo lorem duo ea consetetur, et eirmod takimata.
                                        </li>
                                        <li class="list-group-item px-0">
                                            Amet kasd gubergren sit sanctus et lorem eos sadipscing at.
                                        </li>
                                        <li class="list-group-item px-0">
                                            Duo amet accusam eirmod nonumy stet et et stet eirmod.
                                        </li>
                                        <li class="list-group-item px-0">
                                            Takimata ea clita labore amet ipsum erat justo voluptua. Nonumy.
                                        </li>
                                      </ul> 
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Shop End -->
    
</template>

<script>
export default {
    name:"product-show",
    
    data(){
        return {
            product: [],
            notification: {
            show: false,
            message: ''
            }
        }
    },
    mounted(){
        this.getProduct()    
    },

    methods: {
    getProduct() {
        this.axios.get(`http://127.0.0.1:8000/api/products/${this.$route.params.id}`)
            .then(res=> {
                this.product = res.data.data
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
