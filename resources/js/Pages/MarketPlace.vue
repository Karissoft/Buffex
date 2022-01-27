<template >
 <Head title="Marketplace" />
  <Index :auth="auth"/>
</template>
<script>
import { Head } from '@inertiajs/inertia-vue3';
import Index from '@/MarketPlace/layout/index'

export default {
props:['auth'],
components: {
Index,
Head
}
}
</script>
<style lang="">

</style>