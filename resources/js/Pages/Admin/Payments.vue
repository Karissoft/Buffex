

<template>
  <AdminLayout>

    <template #title>
      Payments
    </template>
    <template #default>
      <Payments/>
    </template>
  </AdminLayout>
</template>

<script>

import AdminLayout from '@/Layouts/AdminLayout';
import Payments from "@/Dashboard/Payments/index";


export default {
  props:['auth'],
  components: {

    Payments,
    AdminLayout
  },
  setup() {
    return {

    };
  },
};
</script>