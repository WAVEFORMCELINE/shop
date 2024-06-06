<template>
    <div>
        <!-- Topbar start -->
        <div class="container-fluid">
            <div class="row align-items-center py-3 px-xl-5">
                <div class="col-lg-3 d-none d-lg-block">
                    <router-link to="/"><a href="" class="text-decoration-none">
                        <h1 class="m-0 display-5 font-weight-semi-bold">Интернет-магазин</h1>
                    </a></router-link>
                </div>
                <div class="col-lg-6 col-6 text-left">
                    <form action="">
                        <div class="input-group">
                            <input type="text" class="form-control" placeholder="Поиск">
                            <div class="input-group-append">
                                <span class="input-group-text bg-transparent text-primary">
                                    <i class="fa fa-search"></i>
                                </span>
                            </div>
                        </div>
                    </form>
                </div>
                <div class="col-lg-3 col-6 text-right">
                    <router-link to="/cart"><a class="btn border">
                        <i class="fas fa-shopping-cart text-primary"></i>
                        <span class="badge">Корзина</span>
                    </a></router-link>
                </div>
            </div>
        </div>
        <!-- Topbar end -->
        
        <!-- Navbar Start -->
        <div class="container-fluid mb-5">
            <div class="row border-top px-xl-5">
                <div class="col-lg-3 d-none d-lg-block">
                    <a class="btn shadow-none d-flex align-items-center justify-content-between bg-primary text-white w-100" data-toggle="collapse" href="#navbar-vertical" style="height: 65px; margin-top: -1px; padding: 0 30px;">
                        <h6 class="m-0">Категории</h6>
                        <i class="fa fa-angle-down text-dark"></i>
                    </a>
                    <nav class="collapse show navbar navbar-vertical navbar-light align-items-start p-0 border border-top-0 border-bottom-0" id="navbar-vertical">
                        <div class="navbar-nav w-100 overflow-hidden" style="height: 410px">
                            <div v-for="category in categories" :key="category.id">
                            <router-link :to="{name: 'product-category', params: {id: category.id}}"><a href="" class="nav-item nav-link">{{ category.name }}</a></router-link>
                            </div>
                        </div>
                    </nav>
                </div>
                <div class="col-lg-9">
                    <nav class="navbar navbar-expand-lg bg-light navbar-light py-3 py-lg-0 px-0">
                        <a href="" class="text-decoration-none d-block d-lg-none">
                            <h1 class="m-0 display-5 font-weight-semi-bold">Интернет-магазин</h1>
                        </a>
                        <div class="navbar-nav mr-auto py-0">
                            <router-link to="/"> <a class="nav-item nav-link">Главная</a> </router-link>
                            <router-link to="/products"> <a class="nav-item nav-link">Каталог</a> </router-link>
                        </div>
                        <!-- <div class="navbar-nav ml-auto py-0">
                            <a href="" class="nav-item nav-link">Войти</a>
                            <a href="" class="nav-item nav-link">Регистрация</a>
                        </div> -->
                    </nav>
                    <!-- Router View -->
                    <router-view></router-view>
                </div>
            </div>
        </div>
        <!-- Navbar End -->
        
        <!-- Footer Start -->
        <div class="container-fluid bg-secondary text-dark mt-5 pt-3">
            <div class="row px-xl-5 pt-5">
                <div class="col-lg-4 col-md-12 mb-5 pr-3 pr-xl-5">
                    <p>Dolore erat dolor sit lorem vero amet. Sed sit lorem magna, ipsum no sit erat lorem et magna ipsum dolore amet erat.</p>
                    <p class="mb-2"><i class="fa fa-map-marker-alt text-primary mr-3"></i>Улан-Удэ, Россия</p>
                    <p class="mb-2"><i class="fa fa-envelope text-primary mr-3"></i>aushaniko@gmail.com</p>
                    <p class="mb-0"><i class="fa fa-phone-alt text-primary mr-3"></i>+7(983)4261995</p>
                </div>
            </div>
            <div class="row border-top border-light mx-xl-5 py-4">
                <div class="col-md-6 px-xl-0">
                    <p class="mb-md-0 text-center text-md-left text-dark">
                        &copy; <a class="text-dark font-weight-semi-bold" href="#">Интернет-магазин</a>
                    </p>
                </div>
            </div>
        </div>
        <!-- Footer End -->
        </div>
</template>

<script>
export default {
    name:"app",
    mounted() {
        this.getCategories()
    },

    data(){
        return {
            categories: [],
        }
    },

    methods: {
        getCategories() {
            this.axios.get('http://127.0.0.1:8000/api/categories')
            .then(res=> {
                this.categories = res.data
            })
        },
    }
}


</script>

<style scoped>
</style>
