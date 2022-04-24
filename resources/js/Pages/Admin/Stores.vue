

<template>
  <AdminLayout>

    <template #title>
      Stores
    </template>
    <template #default>
      <Stores/>
    </template>
  </AdminLayout>
</template>

<script>

import AdminLayout from '@/Layouts/AdminLayout';
import Stores from "@/Dashboard/Stores/index";


export default {
  props:['auth'],
  components: {

    Stores,
    AdminLayout
  },
  setup() {
    return {

    };
  },
};
</script>