const schema = joi.object({
    name: joi
        .string()
        .min(2)
        .max(40)
        .required(),
    dob: joi
        .date()
        .iso()
        .required(),
});

window.homeData = function () {
    return {
        canSubmit: false,
        submitting: false,
        displayName: '👋 ',

        errors: {
            name: null,
            dob: null,
        },

        user: {
            name: null,
            dob: null,
        },

        age: {
            human: null,
            age: null,
            months: null,
            days: null,
            hours: null,
            minutes: null,
            seconds: null,
        },

        checkCanSubmit: async function () {
            this.errors['name'] = null;
            this.errors['dob'] = null;
            const result = schema.validate(this.user, {abortEarly: false});

            if (result.error && result.error.details) {
                this.canSubmit = false;

                result.error.details.map(error => {
                    this.errors[error.context.key] = error.message;
                });

                return false;
            }

            this.canSubmit = true;

            return true;
        },

        submitForm: async function () {
            this.submitting = true;

            await this.checkCanSubmit();

            if (!this.canSubmit) {
                this.submitting = false;
                return;
            }

            const response = await fetch('/calculate', {
                method: 'POST',
                headers: {
                    'Accept': 'application/json',
                    'Content-Type': 'application/json'
                },
                body: JSON.stringify(this.user),
            })

            this.age = await response.json();
            this.submitting = false;
        }
    };
}
