<template>
  <h1 class="title">留言</h1>

  <div class="space-y-8 md:flex md:space-x-8">
    <form @submit.prevent="storeComment">
      <div class="input-group">
        <label>姓名：</label>
        <input type="text" v-model="form.name">
        <div v-if="form.errors.name" class="invalid">
          {{ form.errors.name }}
        </div>
      </div>

      <div class="input-group">
        <label>留言：</label>
        <textarea v-model="form.content"></textarea>
        <div v-if="form.errors.content" class="invalid">
          {{ form.errors.content }}
        </div>
      </div>

      <button class="btn">送出</button>
    </form>

    <ul v-if="comments.length" class="w-[300px] border divide-y shadow rounded-md">
      <li v-for="comment in comments" class="p-4">
        <h2 class="text-2xl font-bold">姓名：{{ comment.name }}</h2>
        <div class="mt-1 text-gray-400 text-sm italic">{{ comment.created_at }}</div>
        <div class="mt-1">{{ comment.content }}</div>
      </li>
    </ul>
  </div>
</template>

<script>
import Layout from '@/layouts/Default.vue'
import { useForm } from '@inertiajs/inertia-vue3'

export default {
  layout: Layout,
  props: {
    comments: Array,
  },
  setup() {
    const form = useForm({
      name: '',
      content: '',
    })

    const storeComment = () => {
      form.post('/comments', {
        onSuccess: () => form.reset(),
      })
    }

    return { form, storeComment }
  },
}
</script>
