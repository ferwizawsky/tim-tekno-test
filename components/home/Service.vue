<script setup lang="ts">
import {
  ShieldCheck,
  HeartHandshake,
  Sparkles,
  Rocket,
  Container,
} from "lucide-vue-next";
</script>
<template>
  <div class="max-w-[820px] mx-auto mb-[75px]">
    <div class="text-center font-semibold text-xl pb-8 mt-[100px]">Service</div>
    <div class="text-center grid grid-cols-2 lg:grid-cols-5 gap-6">
      <OverstoreService
        title="Security"
        desc="Securing API with Encryption on every action"
      >
        <ShieldCheck />
      </OverstoreService>
      <OverstoreService
        title="Service"
        desc="Providing the best and fastest service to customers"
      >
        <HeartHandshake />
      </OverstoreService>
      <OverstoreService
        title="Idea"
        desc="Exploring new idea on every possibility can"
      >
        <Sparkles />
      </OverstoreService>
      <OverstoreService
        title="Unique"
        desc="Unique rewarding points. Shop with confidence"
      >
        <Rocket />
      </OverstoreService>
      <OverstoreService
        title="Shipping"
        desc="Deliver the product fast as we can"
      >
        <Container />
      </OverstoreService>
    </div>
  </div>
</template>
