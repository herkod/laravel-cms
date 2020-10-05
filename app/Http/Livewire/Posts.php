<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Livewire\WithPagination;
use App\Models\Post;

class Posts extends Component
{
    use WithPagination;

    protected $paginationTheme = 'tailwind';

    public $title, $body, $post_id;
    public $postModalForm = false;

    public $confirmingDeletingPost = false;
    public $deletingPostId;

    public function render()
    {
        return view('livewire.posts', ['posts' => Post::paginate(10)]);
    }

    public function create()
    {
        $this->resetInputFields();
        $this->openPostModal();
    }

    public function openPostModal()
    {
        $this->postModalForm = true;
    }

    public function closePostModal()
    {
        $this->postModalForm = false;
    }

    private function resetInputFields(){
        $this->title = '';
        $this->body = '';
        $this->post_id = '';
    }

    public function store()
    {
        $this->validate([
            'title' => 'required',
            'body' => 'required',
        ]);

        Post::updateOrCreate(['id' => $this->post_id], [
            'title' => $this->title,
            'body' => $this->body
        ]);

        session()->flash('message',
            $this->post_id ? 'Post Updated Successfully.' : 'Post Created Successfully.');

        $this->closePostModal();
        $this->resetInputFields();
    }

    public function edit($id)
    {
        $post = Post::findOrFail($id);
        $this->post_id = $id;
        $this->title = $post->title;
        $this->body = $post->body;

        $this->openPostModal();
    }

    public function confirmDelete($id)
    {
        $this->confirmingDeletingPost = true;
        $this->deletingPostId = $id;
    }

    public function deletePost()
    {
        Post::find($this->deletingPostId)->delete();
        $this->confirmingDeletingPost = false;
        session()->flash('message', 'Post Deleted Successfully.');
    }
}
