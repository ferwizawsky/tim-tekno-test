<script setup lang="ts">
import { Button } from "@/components/ui/button";
import KaosHitam from "@/assets/images/kaoshitam.png";
import KaosPutih from "@/assets/images/kaosputih.png";
import Design2 from "@/assets/images/design2.png";
import Design from "@/assets/images/design.svg";
</script>
<template>
  <div>
    <div class="grid lg:grid-cols-2 items-center">
      <div class="max-w-lg mx-auto py-10 lg:py-0">
        <div class="text-3xl lg:text-4xl font-semibold">
          Creativity of Unique Store System
        </div>
        <div class="pt-4">
          Unique finds, rewarding points. Shop with confidence.
        </div>
        <div class="text-center pt-6">
          <Button>EXPLORE NOW</Button>
        </div>
      </div>
      <div class="mt-6 lg:mt-0">
        <div
          class="lg:hidden text-center font-semibold uppercase text-lg pb-4 tracking-widest"
        >
          Latest
        </div>
        <div
          class="grid grid-cols-3 row-start-auto gap-2 lg:gap-3 overflow-hidden"
        >
          <OverstoreProductLatest class="row-span-2 bg-foreground/30">
            <img :src="KaosPutih" class="w-full" />
            <template #footer>
              <span class="text-background">Light Shirt</span>
            </template>
          </OverstoreProductLatest>

          <OverstoreTextShadow class="py-12">
            <!-- Get <br />
            Started -->
          </OverstoreTextShadow>

          <OverstoreTextShadow class="row-span-2 h-full px-6">
            <HomeJourneyPattern />
          </OverstoreTextShadow>
          <OverstoreProductLatest class="p-8">
            <img :src="Design" />
            <template #footer> Design </template>
          </OverstoreProductLatest>

          <OverstoreProductLatest class="col-span-2 pb-10">
            <img :src="Design2" class="h-[140px]" />
            <template #footer> Illustration </template>
          </OverstoreProductLatest>

          <OverstoreProductLatest>
            <img :src="KaosHitam" class="w-[70%] mx-auto" />
            <template #footer> Dark Shirt </template>
          </OverstoreProductLatest>
        </div>
      </div>
    </div>
  </div>
</template>
