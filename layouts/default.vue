<script setup lang="ts">
import { Label } from "@/components/ui/label";
import { Switch } from "@/components/ui/switch";
import { RouterLink } from "vue-router";
import { Home, Timer, CloudRain, AppWindow } from "lucide-vue-next";

const route = useRoute();
const list = [];
const colorMode = useColorMode();

function darkChange(event: string) {
  colorMode.preference = event;
}
</script>
<template>
  <div>
    <div
      class="p-4 flex items-center justify-between sticky top-0 w-full z-20 bg-background/30 backdrop-blur-sm"
    >
      <OverstoreLogoIcon class="cursor-pointer" />
      <div>
        <div class="flex items-center space-x-2">
          <div v-if="route.path == '/'" class="space-x-4 pr-10 hidden lg:block">
            <a href="#" class="text-primary font-semibold">Home</a>
            <a href="#">Whitelist</a>
            <a href="#">About</a>
          </div>
          <Switch
            :checked="colorMode.value == 'dark' ? true : false"
            id="dark-mode"
            @update:checked="$event ? darkChange('dark') : darkChange('light')"
          />
          <Label class="hidden lg:block" for="dark-mode">Dark Mode</Label>
        </div>
      </div>
    </div>

    <SoalNav />
    <OverstoreLoading />
    <OverstoreNotifview />
    <div class="p-4 pb-10">
      <slot />
    </div>
  </div>
</template>
