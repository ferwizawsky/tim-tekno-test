<script setup lang="ts">
import { Label } from "@/components/ui/label";
import { Switch } from "@/components/ui/switch";
import { RouterLink } from "vue-router";
import { Home, Timer, CloudRain, AppWindow, LogOut } from "lucide-vue-next";
import {
  DropdownMenu,
  DropdownMenuContent,
  DropdownMenuItem,
  DropdownMenuTrigger,
} from "@/components/ui/dropdown-menu";

const NotifBar = defineAsyncComponent(
  () => import("@/components/overstore/Notifview.vue")
);

const auth = useAuthStore();
const route = useRoute();
const list = [];
const colorMode = useColorMode();
const router = useRouter();
const item = ref();

async function getUser() {
  item.value = {};
  try {
    const { data } = await useMyFetch("GET", `/account/profile`, null);
    item.value = { ...data.data };
  } catch (error) {
    // logout();
  } finally {
  }
}
function logout() {
  // option.logout();
  auth.token = null;
  router.push("/login");
}

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
      <div class="flex items-center space-x-4">
        <div class="flex items-center space-x-2">
          <Label class="hidden lg:block" for="dark-mode">Dark Mode</Label>
          <Switch
            :checked="colorMode.value == 'dark' ? true : false"
            id="dark-mode"
            @update:checked="$event ? darkChange('dark') : darkChange('light')"
          />
        </div>
        <div>
          <DropdownMenu>
            <DropdownMenuTrigger>
              <button
                class="w-8 h-8 cursor-pointer text-white bg-amber-400 flex items-center justify-center rounded-full"
              >
                {{ item?.nama?.substring(0, 1) ?? "A" }}
              </button>
            </DropdownMenuTrigger>
            <DropdownMenuContent class="w-56 mr-7 mt-2">
              <DropdownMenuItem @click="logout">
                <LogOut class="mr-2 h-4 w-4" />
                <span>Log out</span>
                <!-- <DropdownMenuShortcut>⇧⌘Q</DropdownMenuShortcut> -->
              </DropdownMenuItem>
            </DropdownMenuContent>
          </DropdownMenu>
        </div>
      </div>
    </div>
    <SoalNav />
    <OverstoreLoading />
    <NotifBar />
    <div class="p-4 pb-10">
      <slot />
    </div>
  </div>
</template>
