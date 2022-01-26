

<template>
  <AdminLayout>

    <template #title>
      Dashboard
    </template>
    <template #default>
        <div class="grid grid-cols-2 gap-5">
          <Users/>
          <Vendors />
        </div>
    </template>
  </AdminLayout>
</template>

<script>

import AdminLayout from '@/Layouts/AdminLayout';
import Users from "@/Dashboard/Users/index";
import Vendors from "@/Dashboard/Vendors/index";


export default {
  props:['auth','categories'],
  components: {
    Users,
    Vendors,
    AdminLayout
  },
  setup() {
    return {

    };
  },
};
</script>