<template >
 <Head title="Checkout" />
 <div class="bg-purple-50">
    <Checkout />
 </div>
</template>
<script>
import { Head } from '@inertiajs/inertia-vue3';
import Checkout from '@/MarketPlace/Components/Checkout'

export default {
components: {
Checkout,
Head
}
}
</script>
<style lang="">

</style>