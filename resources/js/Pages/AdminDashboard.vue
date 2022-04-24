

<template>
  <AdminLayout>

    <template #title>
      Dashboard
    </template>
    <template #default>
        <div class="grid grid-cols-1 md:grid-cols-2 gap-12 h-[60vh] mt-8">
          <Link href="/all-customers">
         <div class="bg-white shadow rounded-lg p-24 flex items-center justify-between border-l-[12px] border-purple-400">
          <h1 class="font-bold text-3xl"> Total Customers</h1>
          <h1 class=" text-6xl"> {{ $page.props.customers }}</h1>
         </div>
           </Link>
          <Link  href="/all-stores">
           <div class="bg-white shadow rounded-lg p-24  flex items-center justify-between border-l-[12px] border-purple-400">
             <h1 class="font-bold text-3xl"> Total Stores</h1>
              <h1 class=" text-6xl"> {{ $page.props.stores }}</h1>
           </div>
             </Link>
            <Link  href="/all-products">
             <div class="bg-white shadow rounded-lg p-24  flex items-center justify-between border-l-[12px] border-purple-400">
              <h1 class="font-bold text-3xl">  Total Products</h1>
               <h1 class="f text-6xl"> {{ $page.props.products }}</h1>
             </div>
             </Link>
              <Link  href="/all-orders">
               <div class="bg-white shadow rounded-lg p-24  flex items-center justify-between border-l-[12px] border-purple-400"> <h1 class="font-bold text-3xl"> Total Orders </h1>
                <h1 class=" text-6xl"> {{ $page.props.orders }}</h1>
               </div>
                 </Link>
        </div>
    </template>
  </AdminLayout>
</template>

<script>

import AdminLayout from '@/Layouts/AdminLayout';
import Users from "@/Dashboard/Users/index";
import Vendors from "@/Dashboard/Vendors/index";
import {Link} from '@inertiajs/inertia-vue3'

export default {
  props:['auth','categories'],
  components: {
    Users,
    Vendors,
    AdminLayout,
    Link
  },
  setup() {
    return {

    };
  },
};
</script>