<!-- components/Stopwatch.vue -->
<template>
  <div class="flex justify-center items-center">
    <div class="text-4xl font-bold">{{ formattedTime }}</div>
    <div class="flex flex-col ml-4">
      <button
        class="px-4 py-2 bg-blue-500 text-white rounded-md mb-2"
        @click="startStop"
      >
        {{ isRunning ? "Stop" : "Start" }}
      </button>
      <button class="px-4 py-2 bg-red-500 text-white rounded-md" @click="reset">
        Reset
      </button>
    </div>
  </div>
</template>

<script lang="ts">
export default defineComponent({
  name: "Stopwatch",
  setup() {
    const startTime = ref(0);
    const running = ref(false);

    const elapsedTime = computed(() => {
      if (!startTime.value) return 0;
      return Date.now() - startTime.value;
    });

    const formattedTime = computed(() => {
      const minutes = Math.floor(elapsedTime.value / 60000);
      const seconds = Math.floor((elapsedTime.value % 60000) / 1000);
      const milliseconds = Math.floor((elapsedTime.value % 1000) / 10);
      return `${String(minutes).padStart(2, "0")}:${String(seconds).padStart(
        2,
        "0"
      )}.${String(milliseconds).padStart(2, "0")}`;
    });

    const startStop = () => {
      running.value = !running.value;
      if (running.value) {
        startTime.value = Date.now() - elapsedTime.value;
      }
    };

    const reset = () => {
      startTime.value = 0;
      running.value = false;
    };

    watch(running, () => {
      if (running.value) {
        const update = () => {
          if (running.value) {
            startTime.value = Date.now() - elapsedTime.value;
            requestAnimationFrame(update);
          }
        };
        update();
      }
    });

    return {
      formattedTime,
      isRunning: computed(() => running.value),
      startStop,
      reset,
    };
  },
});
</script>

<style scoped>
/* Add Tailwind CSS utility classes if necessary */
</style>
