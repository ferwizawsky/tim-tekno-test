<script setup lang="ts">
import { Button } from "@/components/ui/button";
</script>

<template>
  <div class="min-h-[2000px] pt-4">
    <HomeLatest />

    <HomeService />
    <HomeProduct />
    <HomeCatalog />

    <iframe
      src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d9973.077805629555!2d112.67905385131039!3d-7.261483923935861!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2dd7fe97676362bf%3A0x9ad9b5fd309d2c8a!2sTandes!5e0!3m2!1sid!2sid!4v1710472287945!5m2!1sid!2sid"
      class="w-full h-[300px] rounded-xl"
      style="border: 0"
      loading="lazy"
      referrerpolicy="no-referrer-when-downgrade"
    ></iframe>

    <HomeFooter />
  </div>
</template>
