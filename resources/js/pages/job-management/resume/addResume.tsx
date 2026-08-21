import { Button } from "@/components/ui/button";
import { Card, CardContent, CardFooter } from "@/components/ui/card";
import { Input } from "@/components/ui/input";
import AppLayout from "@/layouts/app-layout";
import { BreadcrumbItem } from "@/types";
import { Head, useForm } from "@inertiajs/react";
import { Upload } from "lucide-react";

const breadcrumbs: BreadcrumbItem[] = [
    {
        title: 'Add Resume',
        href: '/v1/job-management/add-job',
    },
];

export default function AddResume() {
    const { data, setData, post, processing, errors, reset } = useForm<{
        file: File | null;
    }>({
        file: null,
    });

    const submit = (e: React.FormEvent) => {
        e.preventDefault();

        post(route('store-resume'), {
            forceFormData: true,
            onSuccess: () => {
                reset();
            },
        });
    };
    return (
        <AppLayout breadcrumbs={breadcrumbs}>
            <Head title="Add Resume" />
            <form onSubmit={submit}>
                <Card className="m-5">
                    <CardContent>
                        <div className="space-y-4 mt-5">
                            <div>
                                <h3 className="text-sm font-medium">Resume</h3>
                                <p className="text-sm text-muted-foreground">
                                    Upload your latest resume to automatically build your profile.
                                </p>
                            </div>

                            <label
                                htmlFor="resume"
                                className="group flex min-h-40 cursor-pointer flex-col items-center justify-center rounded-xl border-2 border-dashed border-muted-foreground/20 bg-muted/20 px-6 py-8 text-center transition-all hover:border-primary/50 hover:bg-muted/40"
                            >
                                <div className="mb-4 flex h-12 w-12 items-center justify-center rounded-full bg-background shadow-sm ring-1 ring-border">
                                    <Upload className="h-5 w-5 text-muted-foreground transition-colors group-hover:text-primary" />
                                </div>

                                <p className="text-sm font-semibold">
                                    {data.file
                                        ? data.file.name
                                        : 'Upload your resume'}
                                </p>

                                <p className="mt-1 text-sm text-muted-foreground">
                                    Drag & drop your file here, or{" "}
                                    <span className="font-medium text-primary">
                                        browse
                                    </span>
                                </p>

                                <p className="mt-2 text-xs text-muted-foreground">
                                    PDF only Maximum 2MB
                                </p>

                                <Input
                                    id="resume"
                                    type="file"
                                    accept=".pdf"
                                    className="hidden"
                                    onChange={(e) => {
                                        setData(
                                            'file',
                                            e.target.files?.[0] ?? null
                                        );
                                    }}
                                />
                            </label>

                            {errors.file && (
                                <p className="text-sm text-destructive">
                                    {errors.file}
                                </p>
                            )}
                        </div>
                    </CardContent>
                    <CardFooter>
                        <Button variant={"secondary"} className="px-8 font-medium text-base cursor-pointer" disabled={processing || !data.file}
                        >
                            {processing ? 'Uploading...' : 'Submit'}
                        </Button>
                    </CardFooter>
                </Card>
            </form>
        </AppLayout>
    );
}