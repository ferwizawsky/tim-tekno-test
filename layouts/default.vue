<script setup lang="ts">
import { Label } from "@/components/ui/label";
import { Switch } from "@/components/ui/switch";

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
          <div class="space-x-4 pr-10">
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
    <div class="p-4">
      <slot />
    </div>
  </div>
</template>
