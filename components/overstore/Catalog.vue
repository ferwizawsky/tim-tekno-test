<script setup lang="ts">
import type { HTMLAttributes } from "vue";
import { cn } from "@/lib/utils";
import { Heart } from "lucide-vue-next";
import { priceFormatter } from "@/composables/DataFormatter";

const props = defineProps<{
  class?: HTMLAttributes["class"];
  title?: String;
  price?: Number;
  index?: any;
}>();
</script>

<template>
  <div
    :class="
      cn(
        'p-4 group bg-foreground/5 dark:bg-foreground/30 rounded-lg  flex items-center justify-center h-full relative overflow-hidden',
        props.class
      )
    "
  >
    <div>
      <slot />
    </div>
    <div class="absolute top-3 right-3 text-transparent">
      <button>
        <Heart
          :class="props?.index < 3 ? 'fill-rose-500' : 'fill-foreground/20'"
          class="hover:fill-rose-500"
        />
      </button>
    </div>
    <div
      class="absolute group-hover:bottom-0 ease-in-out duration-150 -bottom-[100%] p-4 bg-background text-center backdrop-blur-sm w-full"
    >
      <div class="font-semibold">{{ title }}</div>
      <div class="text-sm pt-2">
        <span class="px-4 bg-primary text-background rounded-full">
          Rp. {{ priceFormatter(price) }}</span
        >
      </div>
    </div>
  </div>
</template>
