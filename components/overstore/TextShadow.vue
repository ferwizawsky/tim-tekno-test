<script setup lang="ts">
import type { HTMLAttributes } from "vue";
import { cn } from "@/lib/utils";

const props = defineProps<{
  class?: HTMLAttributes["class"];
}>();
</script>

<template>
  <div
    :class="cn('relative flex items-center justify-center h-full', props.class)"
  >
    <!-- <div class="w-6 h-6 bg-foreground/10 absolute top-6 left-11"></div> -->
    <!-- <div
      class="font-bold text-4xl text-right text-background drop-shadow-[0_0.2px_1.2px_rgba(0,0,0,0.4)] tracking-wider absolute bottom-0 right-4"
    >
      <slot />
    </div> -->
    <div class="font-bold uppercase text-2xl relative">
      <slot />
    </div>
  </div>
</template>
