<script setup>
import { Input } from "@/components/ui/input";
import { Textarea } from "@/components/ui/textarea";
import { Button } from "@/components/ui/button";

const item = ref({
  title: "",
  price: null,
  desc: "",
});
const notif = useNotif();
const route = useRoute();
const router = useRouter();

async function getPost() {
  if (notif.loading) return;
  notif.loading = true;
  item.value = {};
  try {
    const { data } = await useMyFetch("GET", `/product/${route.params.id}`);
    item.value = { ...data.data };
    // location.reload();
  } catch (error) {
  } finally {
    notif.loading = false;
  }
}

async function store() {
  if (notif.loading) return;
  notif.loading = true;
  let url = "/product";

  if (route.params.id) {
    url = `/product/${route.params.id}`;
  } else {
    item.value.username = item.value.nrp;
  }
  try {
    const { data } = await useMyFetch("POST", url, item.value);
    if (!route.params.id) notif.make("Succed Create Data!");
    else notif.make("Succed Update Data!");
    router.go(-1);
  } catch (error) {
  } finally {
    notif.loading = false;
  }
}

watch(
  () => item.value,
  (e) => {
    console.log(e);
  },
  {
    deep: true,
  }
);
onMounted(() => {
  if (route.params.id) {
    getPost();
  }
});

definePageMeta({
  layout: "admin",
  middleware: "auth",
});

useHead({
  title: "Admin - Product Management",
});
</script>
<template>
  <div class="">
    <div class="pt-4">
      <div>
        <button @click="$router.go(-1)" class="flex items-center text-gray-400">
          <svg
            xmlns="http://www.w3.org/2000/svg"
            fill="none"
            viewBox="0 0 24 24"
            stroke-width="1.5"
            stroke="currentColor"
            class="w-6 h-6 mr-2"
          >
            <path
              stroke-linecap="round"
              stroke-linejoin="round"
              d="M15.75 19.5L8.25 12l7.5-7.5"
            />
          </svg>
          Back
        </button>
      </div>
      <div class="p-4 space-y-4 max-w-lg mx-auto">
        <div>
          <div class="mt-4">
            <span>Title</span>
            <Input
              type="text"
              v-model="item.title"
              class="Inputan"
              required
              :disabled="!$route.query.type ? true : false"
            />
          </div>

          <div class="mt-4">
            <span>Price</span>
            <Input
              type="text"
              v-model="item.price"
              class="Inputan"
              required
              :disabled="!$route.query.type ? true : false"
            />
          </div>

          <div class="pt-4">
            <span>Desc</span>
            <Textarea
              v-model="item.desc"
              class="Inputan h-[150px]"
              :disabled="!$route.query.type ? true : false"
            ></Textarea>
          </div>
        </div>

        <div class="pt-7 text-center" v-if="$route.query.type ? true : false">
          <Button @click="store()" class="btn-lg">
            {{ $route.query.type != "add" ? "Update" : "Tambah" }} Data
          </Button>
        </div>
      </div>
    </div>
  </div>
</template>
