<script setup lang="ts">
import type { HTMLAttributes } from "vue";
import { cn } from "@/lib/utils";

const props = defineProps<{
  class?: HTMLAttributes["class"];
}>();
</script>

<template>
  <div
    :class="
      cn(
        'p-4 bg-foreground/5 rounded-lg shadow-sm  flex items-center justify-center h-full relative',
        props.class
      )
    "
  >
    <div>
      <slot />
    </div>
    <div
      class="absolute bottom-2 uppercase tracking-widest text-xs font-medium"
    >
      <slot name="footer" />
    </div>
  </div>
</template>
