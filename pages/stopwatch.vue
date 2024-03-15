<script setup lang="ts">
import { Button } from "@/components/ui/button";
import { Play, Pause, Flag, RotateCcw } from "lucide-vue-next";
const currentTime = ref(0);
const isRunning = ref(false);
let intervalId = <any>null;
const list = ref<any>([]);

const reversedList = computed(() => {
  return [...list.value].reverse();
});
const formattedTime = computed(() => {
  const hours = Math.floor(currentTime.value / 3600);
  const minutes = Math.floor((currentTime.value % 3600) / 60);
  const seconds = Math.floor(currentTime.value % 60);
  return [
    hours.toString().padStart(2, "0"),
    minutes.toString().padStart(2, "0"),
    seconds.toString().padStart(2, "0"),
  ].join(":");
});

const toggleRunning = () => {
  if (isRunning.value) {
    stop();
  } else {
    start();
  }
};

const start = () => {
  isRunning.value = true;
  const startTime = Date.now();
  intervalId = setInterval(() => {
    currentTime.value = Math.floor((Date.now() - startTime) / 10);
  }, 10);
};

const stop = () => {
  isRunning.value = false;
  if (intervalId) {
    clearInterval(intervalId);
    intervalId = null;
  }
};

const reset = () => {
  currentTime.value = 0;
  list.value = [];
  stop();
};

onMounted(() => {
  // Cleanup function to clear the interval on component unmount
  return () => {
    stop();
  };
});
</script>
<template>
  <div class="max-w-sm mx-auto text-center pt-24">
    <div class="bg-background/10 backdrop-blur-sm sticky top-[100px] py-6">
      <div class="font-semibold text-6xl">
        {{ formattedTime }}
      </div>
      <div class="space-x-4 pt-10">
        <Button size="icon" @click="list.push(formattedTime)">
          <Flag class="w-4" />
        </Button>

        <Button size="icon" @click="toggleRunning">
          <span v-if="isRunning"><Pause class="w-4" /></span>
          <span v-else><Play class="w-4" /></span>
        </Button>
        <Button
          class="text-rose-500 border-rose-500 hover:bg-rose-500"
          size="icon"
          @click="reset"
        >
          <RotateCcw class="w-4" />
        </Button>
      </div>
    </div>
    <div class="mt-10">
      <transition-group name="list" tag="ul">
        <li
          v-for="(item, index) in list"
          class="text-xl bg-foreground/5 mb-4 p-5 rounded-full"
          :key="index"
        >
          {{ index + 1 }}. {{ item }}
        </li></transition-group
      >
    </div>
  </div>
</template>
<style>
.list-move,  /* apply transition to moving elements */
.list-enter-active,
.list-leave-active {
  transition: all 0.5s ease;
}

.list-enter-from,
.list-leave-to {
  opacity: 0;
  transform: translateX(30px);
}

/* ensure leaving items are taken out of layout flow so that moving
   animations can be calculated correctly. */
.list-leave-active {
  position: absolute;
}
</style>
