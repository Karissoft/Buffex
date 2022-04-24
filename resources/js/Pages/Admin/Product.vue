

<template>
  <AdminLayout>

    <template #title>
      Categories
    </template>
    <template #default>
      <Categories :categories="categories"/>
    </template>
  </AdminLayout>
</template>

<script>

import AdminLayout from '@/Layouts/AdminLayout';
import Categories from "@/Dashboard/Categories/index";


export default {
  props:['auth','categories'],
  components: {

    Categories,
    AdminLayout
  },
  setup() {
    return {

    };
  },
};
</script>