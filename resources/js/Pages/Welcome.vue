<template>
    <Head title="Welcome" />
    <Navigation />
    <Banner />
    <CoinBanner />
    <Product />
    <Buffex />
    <Work />
    <Faq/>
    <Contact />
    <Footer />


</template>

<style scoped>

</style>

<script>
import { Head, Link } from '@inertiajs/inertia-vue3';
import Navigation from '@/Navigation/Header'
import Banner from '@/LandingComponents/Banner'
import CoinBanner from '@/LandingComponents/CoinBanner'
import Product from '@/LandingComponents/Product'
import Buffex from '@/LandingComponents/Buffex'
import Work from '@/LandingComponents/Work'
import Faq from '@/LandingComponents/Faqs'
import Contact from '@/LandingComponents/Contact'
import Footer from '@/Navigation/Footer'
export default {
    components: {
      Head,
      Link,
      Navigation,
      Banner,
      CoinBanner,
      Product,
      Buffex,
      Work,
      Faq,
      Contact,
      Footer

    },
    props: {

    },
}
</script>
