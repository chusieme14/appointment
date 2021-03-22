<template>
    <div>
        <main-header></main-header>
        <navbar></navbar>
        <main-footer></main-footer>
    </div>
</template>
<script>
import MainHeader from './header'
import Navbar from './navbar'
import MainFooter from './footer'
export default {
    components:{
        MainHeader,
        Navbar,
        MainFooter
    }
}
</script>