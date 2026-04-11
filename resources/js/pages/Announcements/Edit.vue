<script setup>
import AnnouncementForm from '@/components/AnnouncementForm.vue'
import { router } from '@inertiajs/vue3'

const props = defineProps({
  announcement: Object,
})

function submit(form) {
  router.put(`/announcements/${props.announcement.id}`, form)
}
</script>

<template>
  <div class="max-w-3xl mx-auto p-6">
    <h1 class="text-3xl font-bold mb-6">Edit Announcement</h1>

    <AnnouncementForm
      :initial-values="{
        title: announcement.title,
        body: announcement.body,
        status: announcement.status,
        audience: announcement.audience || '',
        published_at: announcement.published_at || ''
      }"
      submit-label="Update Announcement"
      @submit="submit"
    />
  </div>
</template>