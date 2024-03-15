<script setup lang="ts">
import {
  Carousel,
  CarouselContent,
  CarouselItem,
  CarouselNext,
  CarouselPrevious,
} from "@/components/ui/carousel";
import { Card, CardContent } from "@/components/ui/card";
import Product1 from "@/assets/images/product1.png";
</script>
<template>
  <div class="max-w-[820px] mx-auto mb-[75px]">
    <div class="text-center font-semibold text-xl pb-8 mt-[100px]">
      Best Product
    </div>
    <div>
      <Carousel
        class="relative w-full"
        :opts="{
          align: 'start',
        }"
      >
        <CarouselContent>
          <CarouselItem
            v-for="(_, index) in 6"
            :key="index"
            class="md:basis-1/2 lg:basis-1/3"
          >
            <OverstoreProduct
              class="pb-10"
              :title="`EXP Lane Tshirt ${index + 1}`"
              :price="49000"
            >
              <img :src="Product1" />
            </OverstoreProduct>
          </CarouselItem>
        </CarouselContent>
        <CarouselPrevious />
        <CarouselNext />
      </Carousel>
    </div>
  </div>
</template>
