<template >
 <Head title="Transaction" />
 <div class="bg-purple-50 h-screen">
  <Transaction />
 </div>

</template>
<script>
import { Head } from '@inertiajs/inertia-vue3';
import Transaction from '@/MarketPlace/Components/transaction'


export default {
components: {
Transaction,
Head
}
}
</script>
<style lang="">

</style>