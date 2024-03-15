<script setup lang="ts">
import type { HTMLAttributes } from "vue";
import { cn } from "@/lib/utils";
import { priceFormatter } from "@/composables/DataFormatter";

const props = defineProps<{
  class?: HTMLAttributes["class"];
  title?: String;
  price?: Number;
}>();
</script>

<template>
  <div>
    <div
      :class="
        cn(
          'p-4 bg-foreground/5 dark:bg-foreground/30 rounded-lg shadow-sm  flex items-center justify-center h-full relative',
          props.class
        )
      "
    >
      <div>
        <slot />
      </div>
    </div>
    <div class="px-2">
      <div class="font-medium pt-4">{{ title }}</div>
      <div class="text-primary text-sm font-semibold">
        Rp. {{ priceFormatter(price) }}
      </div>
    </div>
  </div>
</template>
