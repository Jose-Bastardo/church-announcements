<script setup>
import { reactive } from 'vue'

const props = defineProps({
  initialValues: Object,
  submitLabel: String,
})

const emit = defineEmits(['submit'])

const form = reactive({
  title: props.initialValues.title || '',
  body: props.initialValues.body || '',
  status: props.initialValues.status || 'draft',
  audience: props.initialValues.audience || '',
  published_at: props.initialValues.published_at || '',
})

function handleSubmit() {
  emit('submit', { ...form })
}
</script>

<template>
  <form @submit.prevent="handleSubmit" class="bg-white shadow rounded p-6 space-y-4">
    <div>
      <label class="block mb-1 font-medium">Title</label>
      <input
        v-model="form.title"
        type="text"
        class="border rounded px-3 py-2 w-full text-black"
        placeholder="Title"
      />
    </div>

    <div>
      <label class="block mb-1 font-medium">Body</label>
      <textarea
        v-model="form.body"
        rows="5"
        class="border rounded px-3 py-2 w-full text-black"
        placeholder="Body"
      ></textarea>
    </div>

    <div>
      <label class="block mb-1 font-medium">Status</label>
      <select
        v-model="form.status"
        class="border rounded px-3 py-2 w-full text-black"
      >
        <option value="draft">Draft</option>
        <option value="published">Published</option>
        <option value="archived">Archived</option>
      </select>
    </div>

    <div>
      <label class="block mb-1 font-medium">Audience</label>
      <input
        v-model="form.audience"
        type="text"
        class="border rounded px-3 py-2 w-full text-black"
        placeholder="Audience"
      />
    </div>

    <div>
      <label class="block mb-1 font-medium">Published At</label>
      <input
        v-model="form.published_at"
        type="datetime-local"
        class="border rounded px-3 py-2 w-full text-black"
      />
    </div>

    <div class="pt-2">
      <button
        type="submit"
        class="bg-blue-600 text-white px-4 py-2 rounded hover:bg-blue-700"
      >
        {{ submitLabel }}
      </button>
    </div>
  </form>
</template>