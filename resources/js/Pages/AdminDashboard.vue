<template>
    <AdminLayout>
        <template #title> Dashboard </template>
        <template #default>
            <div class="grid grid-cols-1 md:grid-cols-2 gap-12 h-[60vh] mt-8">
                <Link href="/all-customers">
                    <div
                        class="bg-white shadow rounded-lg py-16 px-16 border-l-[12px] border-purple-600 relative"
                    >
                        <UsersIcon class="w-12 h-12 mb-5 top-8 left-8" />
                      <div class="flex items-center justify-between">
                          <h1 class="font-bold text-2xl">Total Customers</h1>
                        <h1 class="text-4xl">{{ $page.props.customers }}</h1>
                      </div>
                    </div>
                </Link>
                <Link href="/all-stores">
                    <div
                        class="bg-white shadow relative rounded-lg py-16 px-16 border-l-[12px] border-purple-600"
                    >
                    <HomeIcon class="w-12 h-12 mb-5 top-8 left-8" />
                        <div class="flex items-center justify-between">
                          <h1 class="font-bold text-2xl">Total Stores</h1>
                        <h1 class="text-4xl">{{ $page.props.stores }}</h1>
                        </div>
                    </div>
                </Link>
                <Link href="/all-products">
                    <div
                        class="bg-white shadow relative rounded-lg py-16 px-16 border-l-[12px] border-purple-600"
                    >
                    <DatabaseIcon class="w-12 h-12 mb-5 top-8 left-8" />
                        <div class="flex items-center justify-between">
                          <h1 class="font-bold text-2xl">Total Products</h1>
                        <h1 class="f text-4xl">{{ $page.props.products }}</h1>
                        </div>
                    </div>
                </Link>
                <Link href="/all-orders">
                    <div
                        class="bg-white relative shadow rounded-lg py-16 px-16 border-l-[12px] border-purple-600"
                    >
                    <FolderOpenIcon class="w-12 h-12 mb-5 top-8 left-8" />
                       <div class="flex items-center justify-between">
                          <h1 class="font-bold text-2xl">Total Orders</h1>
                        <h1 class="text-4xl">{{ $page.props.orders }}</h1>
                       </div>
                    </div>
                </Link>
            </div>
        </template>
    </AdminLayout>
</template>

<script>
import AdminLayout from "@/Layouts/AdminLayout";
import Users from "@/Dashboard/Users/index";
import Vendors from "@/Dashboard/Vendors/index";
import { Link } from "@inertiajs/inertia-vue3";
import { UsersIcon, HomeIcon, FolderOpenIcon, DatabaseIcon } from "@heroicons/vue/solid";
export default {
    props: ["auth", "categories"],
    components: {
        Users,
        Vendors,
        AdminLayout,
        Link,
        UsersIcon,
        HomeIcon,
        FolderOpenIcon,
        DatabaseIcon
    },
    setup() {
        return {};
    },
};
</script>
