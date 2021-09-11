<template>
  <h1>留言</h1>

  <form @submit.prevent="storeComment">
    <div>姓名：<input type="text" v-model="form.name"></div>
    <div v-if="form.errors.name" class="invalid">{{ form.errors.name }}</div>

    <div>留言：<textarea v-model="form.content"></textarea></div>
    <div v-if="form.errors.content" class="invalid">{{ form.errors.content }}</div>

    <button>送出</button>
  </form>

  <ul>
    <li v-for="comment in comments">
      <h2>姓名：{{ comment.name }}</h2>
      <div>{{ new Date(comment.created_at).toLocaleString() }}</div>
      <div>內容：{{ comment.content }}</div>
    </li>
  </ul>
</template>

<script>
import { useForm } from '@inertiajs/inertia-vue3'

export default {
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
