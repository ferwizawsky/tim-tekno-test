<script setup lang="ts">
import {
  Carousel,
  CarouselContent,
  CarouselItem,
  CarouselNext,
  CarouselPrevious,
} from "@/components/ui/carousel";
import { Card, CardContent } from "@/components/ui/card";
import { Button } from "@/components/ui/button";
</script>

<template>
  <div class="min-h-[2000px] pt-4">
    <HomeLatest />
    <Carousel class="relative w-full max-w-xs">
      <CarouselContent>
        <CarouselItem v-for="(_, index) in 5" :key="index">
          <div class="p-1">
            <Card>
              <CardContent
                class="flex aspect-square items-center justify-center p-6"
              >
                <span class="text-4xl font-semibold">{{ index + 1 }}</span>
              </CardContent>
            </Card>
          </div>
        </CarouselItem>
      </CarouselContent>
      <!-- <CarouselPrevious /> -->
      <!-- <CarouselNext /> -->
    </Carousel>
    <Button>Button</Button>
  </div>
</template>
