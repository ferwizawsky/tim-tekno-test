<script setup>
import { Button } from "@/components/ui/button";
import { Label } from "@/components/ui/label";
import { Input } from "@/components/ui/input";

import { useNotif } from "@/stores/notif";
import { useAuthStore } from "@/stores/auth";

const notif = useNotif();
const router = useRouter();
const auth = useAuthStore();
// const option = useOption();
const isPassword = ref(true);
const formPost = ref({
  username: "admoon",
  password: "admoon",
});
async function onSubmit() {
  try {
    const { data } = await useMyFetch("POST", "/auth/login", formPost.value);
    // console.log(data);
    auth.token = data.token;

    // console.log(auth.token);
    router.push("/master");
    // location.reload();
  } catch (error) {
    console.log(error);
  } finally {
  }
}
</script>

<template>
  <div class="max-w-md mx-auto px-8 pt-[100px]">
    <div class="text-center mb-6">
      <div>
        <svg
          class="mx-auto w-16 mb-4"
          viewBox="0 0 46 57"
          fill="none"
          xmlns="http://www.w3.org/2000/svg"
        >
          <path d="M32.0547 0L0 32.0547H32.0547V0Z" class="fill-primary" />
          <path
            d="M45.5 34.246H0.167834L22.8339 56.9121L45.5 34.246Z"
            class="fill-primary"
          />
        </svg>
      </div>
      <div class="font-semibold text-2xl uppercase">Login</div>
      <!-- <div>Please fill form below to continue</div> -->
      <!-- {{ option.token }} -->
    </div>
    <form
      class="p-6 space-y-4 border border-input pt-8 rounded-xl"
      @submit.prevent="onSubmit"
    >
      <div>
        <Label>Username</Label>
        <Input type="text" placeholder="username" />
      </div>

      <div class="relative">
        <Label>Password</Label>
        <Input
          :type="isPassword ? 'password' : 'text'"
          placeholder="password"
        />
        <span
          class="absolute right-4 top-9 text-xs cursor-pointer select-none"
          @click="isPassword = !isPassword"
          >{{ isPassword ? "Show" : "Hide" }}</span
        >
      </div>

      <div class="text-center mt-4">
        <Button> Sign In </Button>
      </div>
    </form>
  </div>
</template>
