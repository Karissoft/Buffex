

<template>
  <AdminLayout>

    <template #title>
      Customers
    </template>
    <template #default>
      <Customers :customers="customers"/>
    </template>
  </AdminLayout>
</template>

<script>

import AdminLayout from '@/Layouts/AdminLayout';
import Customers from "@/Dashboard/Customers/index";


export default {
  props:['auth','customers'],
  components: {

    Customers,
    AdminLayout
  },
  setup() {
    return {

    };
  },
};
</script>