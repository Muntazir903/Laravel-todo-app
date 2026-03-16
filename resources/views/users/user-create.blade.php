@extends("layouts.app")

@section("content")
    <div class="min-h-screen bg-slate-950">
        <div class="min-h-screen lg:grid lg:grid-cols-2">
            <section
                class="relative flex items-center justify-center overflow-hidden bg-linear-to-br from-[#0c0f2b] via-[#0a1238] to-[#141f5a] px-6 py-12 text-white sm:px-10 lg:px-16">
                <div
                    class="pointer-events-none absolute -left-24 top-10 h-56 w-56 rounded-full bg-blue-400/20 blur-3xl sm:h-72 sm:w-72">
                </div>
                <div
                    class="pointer-events-none absolute -bottom-24 right-6 h-64 w-64 rounded-full bg-indigo-500/20 blur-[120px] sm:h-80 sm:w-80">
                </div>

                <div class="relative z-10 w-full max-w-lg text-center sm:text-left">
                    <p class="text-xs uppercase tracking-[0.4em] text-white/70 sm:text-sm">BALA.</p>
                    <h1 class="mt-16 text-4xl font-semibold italic tracking-tight sm:text-5xl lg:text-6xl">
                        Login page
                    </h1>
                    <p class="mt-4 text-lg text-white/70 sm:text-xl">
                        Start your journey<br class="hidden sm:block">
                        now with us
                    </p>
                </div>
            </section>

            <section class="relative flex items-center justify-center bg-white px-4 py-12 text-slate-900 sm:px-8 lg:px-12">
                <div
                    class="pointer-events-none absolute inset-0 bg-[radial-gradient(circle_at_top,#eef2ff_0%,transparent_55%)]">
                </div>
                <div class="relative w-full max-w-3xl">
                    <div class="grid gap-6 sm:grid-cols-2">
                        <div id="register-card"
                            class="relative z-10 rounded-2xl border border-slate-100 bg-white p-6 shadow-[0_24px_60px_-30px_rgba(15,23,42,0.55)]">
                            <h2 class="text-lg font-semibold text-slate-900">Create an account</h2>
                            <form action="{{ route('register') }}" method="POST" class="mt-5 space-y-4">
                                @csrf
                                <div>
                                    <label for="register-email"
                                        class="mb-2 block text-sm font-medium text-slate-700">Email</label>
                                    <input type="email" id="register-email" name="email" value="{{ old('email') }}"
                                        class="bg-neutral-secondary-medium border border-default-medium text-heading text-sm rounded-base focus:ring-brand focus:border-brand block w-full px-3 py-2.5 shadow-xs placeholder:text-body"
                                        placeholder="name@flowbite.com" required />
                                    @error('email')
                                        <p class="mt-2 text-xs text-red-600">{{ $message }}</p>
                                    @enderror
                                </div>
                                <div>
                                    <label for="register-password"
                                        class="mb-2 block text-sm font-medium text-slate-700">Password</label>
                                    <input type="password" id="register-password" name="password"
                                        class="bg-neutral-secondary-medium border border-default-medium text-heading text-sm rounded-base focus:ring-brand focus:border-brand block w-full px-3 py-2.5 shadow-xs placeholder:text-body"
                                        placeholder="••••••••" required />
                                    @error('password')
                                        <p class="mt-2 text-xs text-red-600">{{ $message }}</p>
                                    @enderror
                                </div>
                                <label for="register-terms" class="flex items-start gap-2">
                                    <input id="register-terms" type="checkbox" value=""
                                        class="mt-1 h-4 w-4 rounded-xs border border-default-medium bg-neutral-secondary-medium focus:ring-2 focus:ring-brand-soft"
                                        required />
                                    <span class="text-sm text-slate-600">I agree with the <a href="#"
                                            class="text-blue-600 hover:underline">terms and conditions</a>.</span>
                                </label>
                                <button type="submit"
                                    class="w-full rounded-xl bg-blue-600 px-4 py-2.5 text-sm font-semibold text-white shadow-md shadow-blue-200/60 transition hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-blue-500/50">
                                    Create account
                                </button>

                                <p class="text-center text-xs text-slate-500">
                                    Already have an account?
                                    <a href="#login-card" class="text-blue-600 hover:underline">Log in</a>
                                </p>
                            </form>
                        </div>

                        <div id="login-card"
                            class="relative rounded-2xl border border-slate-100 bg-white p-6 shadow-[0_24px_60px_-30px_rgba(15,23,42,0.35)] sm:translate-y-6">
                            <h2 class="text-lg font-semibold text-slate-900">Login to your account</h2>
                            <form action="{{ route('login') }}" method="POST" class="mt-5 space-y-4">

                                @csrf

                                <div>
                                    <label for="login-email"
                                        class="mb-2 block text-sm font-medium text-slate-700">Email</label>
                                    <input type="email" id="login-email" name="email" value="{{ old('email') }}"
                                        class="bg-neutral-secondary-medium border border-default-medium text-heading text-sm rounded-base focus:ring-brand focus:border-brand block w-full px-3 py-2.5 shadow-xs placeholder:text-body"
                                        placeholder="name@flowbite.com" required />
                                    @error('email')
                                        <p class="mt-2 text-xs text-red-600">{{ $message }}</p>
                                    @enderror
                                </div>
                                <div>
                                    <div class="flex items-center justify-between">
                                        <label for="login-password"
                                            class="text-sm font-medium text-slate-700">Password</label>
                                        <a href="#" class="text-xs text-blue-600 hover:underline">Forgot?</a>
                                    </div>
                                    <input type="password" id="login-password" name="password"
                                        class="mt-2 bg-neutral-secondary-medium border border-default-medium text-heading text-sm rounded-base focus:ring-brand focus:border-brand block w-full px-3 py-2.5 shadow-xs placeholder:text-body"
                                        placeholder="••••••••" required />
                                    @error('password')
                                        <p class="mt-2 text-xs text-red-600">{{ $message }}</p>
                                    @enderror
                                </div>
                                <button type="submit"
                                    class="w-full rounded-xl bg-blue-600 px-4 py-2.5 text-sm font-semibold text-white shadow-md shadow-blue-200/60 transition hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-blue-500/50">
                                    Login now
                                </button>
                                <p class="text-center text-xs text-slate-500">
                                    Don’t have an account?
                                    <a href="#register-card" class="text-blue-600 hover:underline">Sign up</a>
                                </p>
                            </form>
                        </div>
                    </div>
                </div>
            </section>
        </div>
    </div>
@endsection