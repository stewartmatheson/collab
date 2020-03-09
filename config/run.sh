aws cloudformation create-stack --stack-name collab --template-body "$(cat stack.json)" --capabilities CAPABILITY_NAMED_IAM
