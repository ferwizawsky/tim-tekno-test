<script setup lang="ts">
import {
  Table,
  TableBody,
  TableCaption,
  TableCell,
  TableHead,
  TableHeader,
  TableRow,
} from "@/components/ui/table";
import Paginate from "@/components/overstore/Paginate.vue";
import {
  AlertDialog,
  AlertDialogAction,
  AlertDialogCancel,
  AlertDialogContent,
  AlertDialogDescription,
  AlertDialogFooter,
  AlertDialogHeader,
  AlertDialogTitle,
  AlertDialogTrigger,
} from "@/components/ui/alert-dialog";

import { FileText, FilePenLine, Trash2, Search } from "lucide-vue-next";
import { onMounted, ref } from "vue";

import { useRoute } from "vue-router";
import { useRouter } from "vue-router";

import { useNotif } from "@/stores/notif";
import { Button } from "@/components/ui/button";
import { Input } from "@/components/ui/input";

const notif = useNotif();
const list = ref<any>([]);
const meta = ref({
  current_page: 0,
  from: 0,
  last_page: 0,
  links: [],
  per_page: 0,
  to: 0,
  total: 0,
});

const router = useRouter();
const route = useRoute();
const page = ref(1);
const search = ref("");

async function getData() {
  list.value = [];
  try {
    const { data } = await useMyFetch(
      "GET",
      `/product?page=${page.value}&search=${search.value}`,
      null
    );
    list.value = [...data.data];
    meta.value = data.meta;
  } catch (error) {
    // logout();
  } finally {
  }
}

async function deleteData(e: any) {
  try {
    const { data } = await useMyFetch(
      "DELETE",
      `/product/${e.id}/delete`,
      null
    );
    getData();
    notif.make(`Sukses Mengupdate data`);
  } catch (error) {
  } finally {
  }
}

onMounted(() => {
  getData();
});

const isOpen = ref(false);

function setPage(e: number) {
  router.push(`${route.path}?page=${e}`);
  page.value = e;
  getData();
}

function setSearch() {
  setPage(1);
}

definePageMeta({
  layout: "admin",
  middleware: "auth",
});

useHead({
  title: "Admin - Product Management",
});
</script>
<template>
  <div class="pt-4 max-w-[1024px] mx-auto">
    <div class="lg:flex items-center justify-between pb-6">
      <div class="">
        <Button variant="crystal">Add Data</Button>
      </div>
      <form
        @submit.prevent="setSearch()"
        class="max-w-[400px] relative text-base"
      >
        <Input type="text" v-model="search" placeholder="Search....." />
        <button
          class="absolute top-2.5 right-3 hover:text-primary text-foreground/30"
        >
          <Search />
        </button>
      </form>
    </div>
    <Table>
      <TableHeader>
        <TableRow>
          <TableHead> No. </TableHead>
          <TableHead> Title </TableHead>
          <TableHead>Desc</TableHead>
          <TableHead>Price</TableHead>
          <TableHead> Aksi </TableHead>
        </TableRow>
      </TableHeader>
      <TableBody>
        <TableRow v-for="(item, index) in list">
          <TableCell>{{ (page - 1) * 10 + index + 1 }}</TableCell>
          <TableCell>
            {{ item.title }}
          </TableCell>
          <TableCell>{{ item.desc }}</TableCell>
          <TableCell>Rp. {{ priceFormatter(item.price) }}</TableCell>
          <TableCell class="flex items-center space-x-2">
            <RouterLink :to="`${route.path}/${item.id}`">
              <Button
                size="icon"
                class="bg-primary/20 hover:bg-primary/80 border-none w-8 h-8"
              >
                <FileText class="w-4 h-4" />
              </Button>
            </RouterLink>

            <RouterLink :to="`${route.path}/${item.id}?type=edit`">
              <Button
                size="icon"
                class="bg-primary/20 hover:bg-primary/80 border-none w-8 h-8"
              >
                <FilePenLine class="w-4 h-4" />
              </Button>
            </RouterLink>

            <AlertDialog>
              <AlertDialogTrigger as-child>
                <Button
                  size="icon"
                  class="bg-rose-400/20 hover:bg-rose-400/80 text-rose-500 border-none w-8 h-8"
                >
                  <Trash2 class="w-4 h-4" />
                </Button>
              </AlertDialogTrigger>
              <AlertDialogContent>
                <AlertDialogHeader>
                  <AlertDialogTitle>Do you want to delete ?</AlertDialogTitle>
                  <AlertDialogDescription>
                    Becareful, do you want to delete product
                    {{ item?.title }} ? You can't revert this action
                  </AlertDialogDescription>
                </AlertDialogHeader>
                <AlertDialogFooter>
                  <AlertDialogCancel> Cancel </AlertDialogCancel>
                  <AlertDialogAction @click="deleteData(item)">
                    Continue
                  </AlertDialogAction>
                </AlertDialogFooter>
              </AlertDialogContent>
            </AlertDialog>
          </TableCell>
        </TableRow>
      </TableBody>
    </Table>

    <Paginate
      @move="setPage($event)"
      :page="page"
      :list="meta?.links"
      :meta="meta"
    />
  </div>
</template>
