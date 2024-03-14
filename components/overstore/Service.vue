<script setup lang="ts">
const props = defineProps(["title", "desc"]);
</script>
<template>
  <div class="hover:translate-y-[-10px] duration-100 ease-in-out">
    <div class="flex items-center">
      <div class="p-4 bg-primary/15 text-primary mx-auto rounded-lg">
        <slot />
      </div>
    </div>
    <div class="font-semibold pt-4">{{ props?.title }}</div>
    <div class="text-sm">{{ props?.desc }}</div>
  </div>
</template>
