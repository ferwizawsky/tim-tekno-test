<script setup>
const props = defineProps(["list", "page", "meta"]);
const emit = defineEmits(["move"]);

function getClass(index) {
  let str = "";
  if (props.page == index.label)
    str = "bg-primary/50 text-text-foreground border-none";
  else str = "border-foreground/30 hover:text-primary";
  if (!index.url) str = "hidden";

  if (Number(index.label)) str = str + " w-9 h-9 border mx-1 ";
  else str = str + "  mx-2 py-4";
  return str;
}
</script>
<template>
  <div class="grid lg:grid-cols-3 gap-4 items-center mt-2 pt-4">
    <div>Showing {{ meta?.from }} to 10 of {{ meta?.total }} entries</div>
    <div class="lg:ml-auto mx-auto lg:mr-0 lg:col-span-2">
      <div class="px-4 w-full flex flex-wrap items-center">
        <button
          @click="emit('move', index.url.split('=')[1])"
          :class="getClass(index)"
          v-for="index in list"
          v-html="index.label"
          class="rounded-md flex justify-center items-center"
        ></button>
      </div>
    </div>
  </div>
</template>
