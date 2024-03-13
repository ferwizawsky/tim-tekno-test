<script setup lang="ts">
const list = [];
</script>
<template>
  <div>
    <div
      class="p-4 flex items-center justify-between sticky top-0 w-full z-20 bg-background/20 backdrop-blur-sm"
    >
      <OverstoreLogoIcon class="cursor-pointer" />
      <div></div>
    </div>
    <div class="p-4">
      <slot />
    </div>
  </div>
</template>
