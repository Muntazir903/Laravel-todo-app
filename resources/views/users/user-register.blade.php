@extends("layouts.app")

@section("content")
    <div class="relative min-h-screen overflow-hidden bg-gradient-to-br from-[#0b1026] via-[#0c1430] to-[#090f24]">
        <div class="pointer-events-none absolute -left-24 -top-24 h-80 w-80 rounded-full bg-blue-500/20 blur-[140px]"></div>
        <div class="pointer-events-none absolute -bottom-32 left-16 h-96 w-96 rounded-full bg-indigo-500/20 blur-[160px]"></div>
        <div class="pointer-events-none absolute -right-32 top-20 h-96 w-96 rounded-full bg-sky-400/20 blur-[160px]"></div>

        <div class="relative z-10 flex min-h-screen items-center justify-center px-6 py-10 sm:px-10">
            <div
                class="w-full max-w-[1300px] overflow-hidden rounded-[24px] bg-white/85 shadow-[0_50px_120px_-60px_rgba(15,23,42,0.65)] ring-1 ring-white/40 backdrop-blur-xl">
                <div class="grid gap-0 lg:grid-cols-2">
                    <section
                        class="relative flex min-h-[260px] flex-col justify-center overflow-hidden bg-gradient-to-br from-[#0b0f2a] via-[#121a44] to-[#0b0f2a] px-8 py-8 text-white sm:min-h-[340px] sm:px-12 sm:py-10 lg:min-h-[560px] lg:py-12">
                        <div class="pointer-events-none absolute -left-20 top-6 h-56 w-56 rounded-full bg-blue-400/20 blur-3xl"></div>
                        <div class="pointer-events-none absolute -bottom-24 right-6 h-72 w-72 rounded-full bg-indigo-500/20 blur-[120px]"></div>

                        <div class="absolute left-10 top-10 text-xs font-semibold uppercase tracking-[0.4em] text-white/70">
                            DailyTask Manager
                        </div>

                        <div class="relative z-10 max-w-md">
                            <h1 class="text-4xl font-semibold italic tracking-tight sm:text-5xl lg:text-6xl">
                                Register page
                            </h1>
                            <p class="mt-4 text-lg italic text-white/70 sm:text-xl">
                                Start your journey<br class="hidden sm:block">
                                now with us
                            </p>
                        </div>
                    </section>

                    <section
                        class="relative flex min-h-[420px] items-center justify-center bg-slate-50/90 px-6 py-12 sm:px-10 lg:min-h-[560px]">
                        <div class="pointer-events-none absolute inset-0 bg-[radial-gradient(circle_at_top,#eef2ff_0%,transparent_55%)]">
                        </div>

                        <div class="relative w-full max-w-sm">
                            <div id="register-card"
                                class="rounded-2xl border border-slate-100 bg-white p-6 shadow-[0_24px_60px_-30px_rgba(15,23,42,0.35)]">
                                <h2 class="text-lg font-semibold text-slate-900">Create an account</h2>
                                <form action="{{ route('register') }}" method="POST" class="mt-5 space-y-4">
                                    @csrf
                                    <div>
                                        <label for="register-username"
                                            class="mb-2 block text-sm font-medium text-slate-700">Username</label>
                                        <input type="text" id="register-username" name="username"
                                            value="{{ old('username') }}"
                                            class="block w-full rounded-xl border border-slate-200 bg-white px-3 py-2.5 text-sm text-slate-900 shadow-sm placeholder:text-slate-400 focus:border-blue-500 focus:outline-none focus:ring-2 focus:ring-blue-100"
                                            placeholder="balamiq" required />
                                        @error('username')
                                            <p class="mt-2 text-xs text-red-600">{{ $message }}</p>
                                        @enderror
                                    </div>
                                    <div>
                                        <label for="register-email"
                                            class="mb-2 block text-sm font-medium text-slate-700">Email</label>
                                        <input type="email" id="register-email" name="email" value="{{ old('email') }}"
                                            class="block w-full rounded-xl border border-slate-200 bg-white px-3 py-2.5 text-sm text-slate-900 shadow-sm placeholder:text-slate-400 focus:border-blue-500 focus:outline-none focus:ring-2 focus:ring-blue-100"
                                            placeholder="balamiq@gmail.com" required />
                                        @error('email')
                                            <p class="mt-2 text-xs text-red-600">{{ $message }}</p>
                                        @enderror
                                    </div>
                                    <div>
                                        <label for="register-password"
                                            class="mb-2 block text-sm font-medium text-slate-700">Password</label>
                                        <input type="password" id="register-password" name="password"
                                            class="block w-full rounded-xl border border-slate-200 bg-white px-3 py-2.5 text-sm text-slate-900 shadow-sm placeholder:text-slate-400 focus:border-blue-500 focus:outline-none focus:ring-2 focus:ring-blue-100"
                                            placeholder="Enter your password" required />
                                        @error('password')
                                            <p class="mt-2 text-xs text-red-600">{{ $message }}</p>
                                        @enderror
                                    </div>
                                    <button type="submit"
                                        class="w-full rounded-xl bg-blue-600 px-4 py-2.5 text-sm font-semibold text-white shadow-md shadow-blue-200/60 transition hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-blue-500/40">
                                        Create account
                                    </button>

                                    <p class="text-center text-xs text-slate-500">
                                        Already have an account?
                                        <a href="{{ url('/index2') }}" class="font-semibold text-blue-600 hover:underline">Log in</a>
                                    </p>
                                </form>
                            </div>
                        </div>
                    </section>
                </div>
            </div>
        </div>
    </div>
@endsection
