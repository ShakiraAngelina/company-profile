<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\News;
use App\Models\Project;
use App\Models\Publication;
use App\Models\Career;
use App\Models\Notification;

class AdminController extends Controller
{
    public function index()
    {
        return view('admin.index');
    }

    public function storeNews(Request $request)
    {
        $data = $request->validate([
            'title' => ['required','string','max:255'],
            'content' => ['required','string'],
            'image_url' => ['nullable','string','max:1000'],
            'image_file' => ['nullable','file','image','mimes:jpg,jpeg,png,webp,gif','max:10240'],
        ]);

        $payload = [
            'title' => $data['title'],
            'content' => $data['content'],
        ];

        if ($request->hasFile('image_file')) {
            $path = $request->file('image_file')->store('news/images','public');
            // Simpan sebagai path relatif agar tidak tergantung domain
            $payload['image'] = '/storage/'.$path;
        } else if ($request->filled('image_url')) {
            $payload['image'] = $data['image_url'];
        } else {
            $payload['image'] = null;
        }

        News::create($payload);
        return back()->with('success', 'News created');
    }

    public function updateNews($id, Request $request)
    {
        $news = News::findOrFail($id);
        $data = $request->validate([
            'title' => ['required','string','max:255'],
            'content' => ['required','string'],
            'image_url' => ['nullable','string','max:1000'],
            'image_file' => ['nullable','file','image','mimes:jpg,jpeg,png,webp,gif','max:10240'],
        ]);

        $news->title = $data['title'];
        $news->content = $data['content'];

        if ($request->hasFile('image_file')) {
            $path = $request->file('image_file')->store('news/images','public');
            // Simpan sebagai path relatif
            $news->image = '/storage/'.$path;
        } else if ($request->filled('image_url')) {
            $news->image = $data['image_url'];
        } else {
            // keep existing image if neither file nor URL provided
            $news->image = $news->image;
        }

        $news->save();
        return back()->with('success', 'News updated');
    }

    public function storeProject(Request $request)
    {
        $data = $request->validate([
            'title' => ['required','string','max:255'],
            'description' => ['required','string'],
            'image_url' => ['nullable','string','max:1000'],
            'image_file' => ['nullable','file','image','mimes:jpg,jpeg,png,webp,gif','max:5120'],
            'category' => ['nullable','string','max:100'],
        ]);

        $payload = [
            'title' => $data['title'],
            'description' => $data['description'],
            'category' => $data['category'] ?? null,
        ];

        if ($request->hasFile('image_file')) {
            $path = $request->file('image_file')->store('projects/images','public');
            // Simpan sebagai path relatif
            $payload['image'] = '/storage/'.$path;
        } else {
            $payload['image'] = $data['image_url'] ?? null;
        }

        Project::create($payload);
        return back()->with('success', 'Project created');
    }

    public function updateProject($id, Request $request)
    {
        $project = Project::findOrFail($id);
        $data = $request->validate([
            'title' => ['required','string','max:255'],
            'description' => ['required','string'],
            'image_url' => ['nullable','string','max:1000'],
            'image_file' => ['nullable','file','image','mimes:jpg,jpeg,png,webp,gif','max:5120'],
            'category' => ['nullable','string','max:100'],
        ]);

        $project->title = $data['title'];
        $project->description = $data['description'];
        $project->category = $data['category'] ?? null;

        if ($request->hasFile('image_file')) {
            $path = $request->file('image_file')->store('projects/images','public');
            // Simpan sebagai path relatif
            $project->image = '/storage/'.$path;
        } else if ($request->filled('image_url')) {
            $project->image = $data['image_url'];
        } // else keep existing image

        $project->save();
        return back()->with('success', 'Project updated');
    }

    public function storePublication(Request $request)
    {
        $data = $request->validate([
            'title' => ['required','string','max:255'],
            'file_url' => ['nullable','string','max:1000'],
            'file_upload' => ['nullable','file','mimes:pdf,doc,docx','max:12288'],
        ]);

        $filePath = null;
        if ($request->hasFile('file_upload')) {
            $path = $request->file('file_upload')->store('publications/files','public');
            // Store raw path; view will convert to /storage URL if needed
            $filePath = $path;
        } else {
            $filePath = $data['file_url'] ?? null;
        }

        if (!$filePath) {
            return back()->withErrors(['file_url' => 'Please provide a file URL or upload a file.'])->withInput();
        }

        Publication::create([
            'title' => $data['title'],
            'file' => $filePath,
        ]);
        return back()->with('success', 'Publication created');
    }

    public function storeCareer(Request $request)
    {
        $data = $request->validate([
            'job_title' => ['required','string','max:200'],
            'description' => ['required','string'],
            'requirements' => ['required','string'],
            'status' => ['required','in:open,closed'],
        ]);
        Career::create($data);
        return back()->with('success', 'Career created');
    }

    public function updateCareer($id, Request $request)
    {
        $career = Career::findOrFail($id);
        $data = $request->validate([
            'job_title' => ['required','string','max:200'],
            'description' => ['required','string'],
            'requirements' => ['required','string'],
            'status' => ['required','in:open,closed'],
        ]);

        $career->job_title = $data['job_title'];
        $career->description = $data['description'];
        $career->requirements = $data['requirements'];
        $career->status = $data['status'];
        $career->save();

        return back()->with('success', 'Career updated');
    }

    public function readAllNotifications(Request $request)
    {
        if (!session('is_admin')) {
            return redirect('/admin/login');
        }
        Notification::whereNull('read_at')->update(['read_at' => now()]);
        return back()->with('success', 'Notifications marked as read');
    }

    public function openNotification($id)
    {
        if (!session('is_admin')) {
            return redirect('/admin/login');
        }
        $n = Notification::findOrFail($id);
        if (!$n->read_at) {
            $n->read_at = now();
            $n->save();
        }
        // Map type ke halaman admin terkait
        $map = [
            'message' => '/admin/messages',
            'project' => '/admin/projects',
            'news' => '/admin/news',
            'publication' => '/admin/publications',
            'career' => '/admin/careers',
        ];
        $dest = $map[$n->type] ?? '/admin/dashboard';
        return redirect($dest);
    }
}