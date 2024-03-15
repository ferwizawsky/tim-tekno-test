<script setup lang="ts">
import { Home, Timer, CloudRain, AppWindow } from "lucide-vue-next";

const route = useRoute();
function getClass(e: String) {
  if (route.path == e) return "text-background";
  return "hover:text-background";
}
</script>
<template>
  <div
    class="p-4 fixed rounded-xl bottom-1/2 right-4 z-20 bg-foreground/30 backdrop-blur-sm text-background/40 space-y-5"
  >
    <div>
      <RouterLink :class="getClass('/')" to="/"><Home /></RouterLink>
    </div>
    <div>
      <RouterLink :class="getClass('/stopwatch')" to="/stopwatch"
        ><Timer
      /></RouterLink>
    </div>
    <div>
      <RouterLink :class="getClass('/master')" to="/master"
        ><CloudRain
      /></RouterLink>
    </div>
    <div>
      <RouterLink :class="getClass('/logika')" to="/logika"
        ><AppWindow
      /></RouterLink>
    </div>
  </div>
</template>
