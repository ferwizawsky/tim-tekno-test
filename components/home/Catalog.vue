<script setup lang="ts">
import Product1 from "@/assets/images/product1.png";
</script>
<template>
  <div class="max-w-[820px] mx-auto mb-[75px]">
    <div class="text-center font-semibold text-xl pb-8 mt-[100px]">
      Catalog Product
    </div>
    <div class="grid grid-cols-1 lg:grid-cols-3 gap-2">
      <OverstoreCatalog
        v-for="index in 9"
        class=""
        :index="index"
        :title="`EXP Lane Tshirt ${index + 1}`"
        :price="49000"
      >
        <img :src="Product1" />
      </OverstoreCatalog>
    </div>
  </div>
</template>
