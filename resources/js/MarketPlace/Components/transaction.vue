
<template>
  <TopBar />
  <div class="container mx-auto py-10">
    <div class="w-2/6 mx-auto">
      <div class="mt-5 md:mt-0 md:col-span-2">
        <div class="shadow overflow-hidden sm:rounded-md">
          <div class="px-4 py-3">
            <h3 class="text-lg font-medium leading-6 text-gray-900">
              Order Information
            </h3>
          </div>

          <div class="px-4 py-5 bg-white sm:p-6" v-if="status==='paid'">
            <div class="flex flex-col align items-center justify-center mb-8">
              <CheckCircleIcon class="w-36 h-36 text-green-700" />
              <p>Your order has been placed successfully</p>
            </div>
            <div class="flex justify-between">
              <p>Order No</p>
              <p>#{{order.order_no}}</p>
            </div>

            <div class="flex justify-between">
              <p>Order Date</p>
              <p>{{moment(order.created_at).format("MMM ddd, yyyy") }}</p>
            </div>
            <div class="flex justify-between">
              <p>Items</p>
              <p>{{items}}</p>
            </div>
            <div class="flex justify-between">
              <p>Total Price</p>
              <p>{{currency(order.total_amount)}}</p>
            </div>
            <div class="flex justify-between">
              <p>Status</p>
              <p class="text-capitalize">{{payment.status}}</p>
            </div>
            <div class="flex justify-between">
              <p>Delivery Status</p>
              <p>Out for delivery</p>
            </div>

            <div class="flex justify-center mt-4">
              <Link href="/marketplace">
              <button
                type="button"
                class="
                  font-bold
                  px-4
                  py-2
                  text-sm
                  whitespace-nowrap
                  relative
                  cursor-pointer
                  border border-transparent
                  rounded-md
                  shadow-sm
                  bg-purple-700
                  hover:bg-purple-500
                  flex
                  justify-between
                "
              >
                <span class="text-white">Back to marketplace</span>
              </button>
              </Link>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</template>
<script>
import { ref } from "vue";
import { StarIcon, CheckCircleIcon } from "@heroicons/vue/solid";
import { RadioGroup, RadioGroupLabel, RadioGroupOption } from "@headlessui/vue";
import TopBar from "../layout/topbar.vue";
import moment from "moment"
import { Link } from "@inertiajs/inertia-vue3";
const breadcrumbs = [
  { id: 1, name: "Home", href: "/home" },
  { id: 2, name: "Marketplace", href: "/" },
];
const reviews = { href: "#", average: 4, totalCount: 117 };

export default {
  components: {
    Link,
    RadioGroup,
    RadioGroupLabel,
    RadioGroupOption,
    StarIcon,
    TopBar,
    CheckCircleIcon,

  },

  inject:['emitter','currency'],
  setup() {
    const status = ref("verifying");
    const order = ref(null)
     const items = ref(0)
    const payment = ref(null)
    return {
      reviews,
      status,
      breadcrumbs,
      order,
      payment,
      items
    };
  },
  mounted() {
     this.moment = moment;
    this.verifytransaction();
  },
  methods: {
    verifytransaction() {
      let txn = window.location.search.substring(1).replace("txn_id=", "");

      axios.get(`/verify-transaction/${txn}`).then((res) => {
       if(res.status===200){
          this.status = 'paid'
        this.order = res.data.order
        this.payment = res.data.payment
        this.items = res.data.items
         localStorage.setItem("cartItems", JSON.stringify([]));
         this.emitter.emit('updatecart')
       }

      });
    },
  },
};
</script>