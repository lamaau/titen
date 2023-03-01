<script lang="ts" setup>
import Layout from "./components/layout.vue";
import Container from "./components/container.vue";

defineProps<{
  title: string;
}>();
</script>

<template>
  <Layout :title="title">
    <main class="mb-20 space-y-20">
      <div class="relative" id="home">
        <div
          aria-hidden="true"
          class="absolute inset-0 grid grid-cols-2 -space-x-52 opacity-40 dark:opacity-20"
        >
          <div
            class="h-56 bg-gradient-to-br from-primary to-purple-400 blur-[106px] dark:from-blue-700"
          ></div>
          <div
            class="h-32 bg-gradient-to-r from-cyan-400 to-sky-300 blur-[106px] dark:to-indigo-600"
          ></div>
        </div>
        <div class="relative ml-auto pt-[220px]">
          <div class="mx-auto text-center lg:w-2/3">
            <Container>
              <h1
                class="text-5xl font-bold text-gray-900 dark:text-white md:text-6xl xl:text-7xl"
              >
                Let's start your own bussines
                <span class="text-primary">with us</span>
              </h1>
              <p class="mt-10 text-gray-700 dark:text-gray-300 md:mx-36">
                Laravel SaaS Starter is an
                <span class="text-primary">SaaS Boilerplate Template</span> that
                can help you develop faster. Made with Laravel, Vue and
                Tailwind. Building from Developer for Developer.
              </p>
            </Container>
            <div
              class="mt-16 hidden justify-between border-y border-gray-100 py-8 dark:border-gray-800 sm:flex"
            >
              <div class="text-center">
                <h6 class="text-lg font-semibold text-gray-700 dark:text-white">
                  Clean Code
                </h6>
                <p class="mt-2 w-max text-gray-500">
                  Clean Code & Easy to Understand.
                </p>
              </div>
              <div class="text-center">
                <h6 class="text-lg font-semibold text-gray-700 dark:text-white">
                  Tested
                </h6>
                <p class="mt-2 text-gray-500">
                  Ensure all test passed before ship.
                </p>
              </div>
              <div class="text-center">
                <h6 class="text-lg font-semibold text-gray-700 dark:text-white">
                  UI Scafolding
                </h6>
                <p class="mt-2 text-gray-500">Reusasble tailwind components.</p>
              </div>
            </div>
          </div>
        </div>
      </div>
    </main>
  </Layout>
</template>
