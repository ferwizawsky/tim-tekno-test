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
        'p-4 bg-foreground/5 rounded-lg shadow-sm relative flex items-center justify-center h-full',
        props.class
      )
    "
  >
    <div>
      <slot />
    </div>
  </div>
</template>
