<script setup>
import AnnouncementForm from '@/components/AnnouncementForm.vue'
import { router } from '@inertiajs/vue3'

function submit(form) {
  router.post("/announcements", form)
}
</script>

<template>
  <div class="max-w-3xl mx-auto p-6">
    <h1 class="text-3xl font-bold mb-6">Create Announcement</h1>

    <AnnouncementForm
      :initial-values="{
        title: '',
        body: '',
        status: 'draft',
        audience: '',
        published_at: ''
      }"
      submit-label="Create Announcement"
      @submit="submit"
    />
  </div>
</template>