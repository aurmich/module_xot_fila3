# Git Conflicts Resolution Guide

## Overview

This guide provides step-by-step instructions for resolving Git conflicts in Laraxot projects. Git conflicts occur when multiple developers modify the same file or when merging branches with conflicting changes.

## Common Conflict Scenarios

### 1. **Merge Conflicts**
- Conflicts during `git merge` operations
- Conflicts during `git pull` operations
- Conflicts during `git rebase` operations

### 2. **Rebase Conflicts**
- Conflicts during interactive rebase
- Conflicts when rebasing feature branches

### 3. **Cherry-pick Conflicts**
- Conflicts when applying specific commits to other branches

## Conflict Resolution Process

### Step 1: Identify Conflicts
```bash
# Check for conflicts
git status

# View conflicted files
git diff --name-only --diff-filter=U
```

### Step 2: Open Conflicted Files
Conflicted files will contain conflict markers:
```php
<<<<<<< HEAD
// Your current changes
=======
// Incoming changes
>>>>>>> branch-name
```

### Step 3: Resolve Conflicts
1. **Remove conflict markers**
2. **Choose the correct code** (or merge both)
3. **Ensure code compiles and tests pass**
4. **Remove any temporary debugging code**

### Step 4: Stage Resolved Files
```bash
# Add resolved files
git add <filename>

# Or add all resolved files
git add .
```

### Step 5: Complete the Operation
```bash
# For merge conflicts
git commit -m "Resolve merge conflicts"

# For rebase conflicts
git rebase --continue

# For cherry-pick conflicts
git cherry-pick --continue
```

## Conflict Resolution Strategies

### 1. **Accept Current Changes (HEAD)**
```bash
git checkout --ours <filename>
```

### 2. **Accept Incoming Changes**
```bash
git checkout --theirs <filename>
```

### 3. **Manual Resolution**
- Edit the file manually
- Remove conflict markers
- Choose the best code from both versions
- Ensure the result is syntactically correct

### 4. **Use Merge Tool**
```bash
# Configure merge tool
git config --global merge.tool vscode

# Use merge tool
git mergetool
```

## Laraxot-Specific Conflict Resolution

### 1. **Model Conflicts**
When resolving conflicts in model files:
- Ensure proper inheritance from BaseModel
- Verify namespace correctness
- Check PHPDoc annotations
- Validate relationships and methods

### 2. **Migration Conflicts**
When resolving conflicts in migration files:
- Ensure proper extension of XotBaseMigration
- Verify table and column existence checks
- Check for proper up() method implementation
- Remove any down() methods

### 3. **Translation File Conflicts**
When resolving conflicts in translation files:
- Maintain expanded structure for fields and actions
- Use short array syntax `[]`
- Ensure all keys are preserved
- Verify translation key consistency

### 4. **Filament Resource Conflicts**
When resolving conflicts in Filament resources:
- Ensure proper extension of XotBase classes
- Verify getFormSchema() implementation
- Check for hardcoded labels
- Validate table column definitions

## Best Practices

### 1. **Before Resolving**
- Commit or stash current work
- Understand the context of both changes
- Communicate with team members if needed
- Have a backup of the current state

### 2. **During Resolution**
- Test code after each major change
- Run PHPStan analysis to ensure code quality
- Verify that tests still pass
- Check for syntax errors

### 3. **After Resolution**
- Run comprehensive tests
- Verify functionality works as expected
- Update documentation if needed
- Commit with clear commit message

## Common Conflict Patterns

### 1. **Method Signature Conflicts**
```php
// Conflict
<<<<<<< HEAD
public function process(array $data): void
=======
public function process($data)
>>>>>>> feature-branch

// Resolution
public function process(array $data): void
```

### 2. **Property Definition Conflicts**
```php
// Conflict
<<<<<<< HEAD
/** @var list<string> */
protected $fillable = ['name', 'email'];
=======
protected $fillable = ['name'];
>>>>>>> feature-branch

// Resolution
/** @var list<string> */
protected $fillable = ['name', 'email'];
```

### 3. **Import Statement Conflicts**
```php
// Conflict
<<<<<<< HEAD
use Modules\Xot\Models\XotBaseModel;
=======
use Illuminate\Database\Eloquent\Model;
>>>>>>> feature-branch

// Resolution
use Modules\Xot\Models\XotBaseModel;
```

## Prevention Strategies

### 1. **Regular Pulls**
```bash
# Pull changes regularly
git pull origin main

# Or with rebase
git pull --rebase origin main
```

### 2. **Small, Focused Commits**
- Make small, logical commits
- Avoid mixing unrelated changes
- Use descriptive commit messages

### 3. **Communication**
- Coordinate with team members
- Avoid working on the same files simultaneously
- Use feature branches for major changes

### 4. **Code Review**
- Review code before merging
- Catch conflicts early in the process
- Ensure code quality standards

## Tools and Commands

### 1. **Conflict Detection**
```bash
# Check for conflicts
git status

# View conflict details
git diff

# List conflicted files
git diff --name-only --diff-filter=U
```

### 2. **Conflict Resolution**
```bash
# Abort current operation
git merge --abort
git rebase --abort
git cherry-pick --abort

# Continue after resolution
git merge --continue
git rebase --continue
git cherry-pick --continue
```

### 3. **Conflict History**
```bash
# View merge history
git log --merges

# View conflict resolution commits
git log --grep="Resolve"
```

## Troubleshooting

### 1. **Cannot Continue Operation**
```bash
# Check status
git status

# Ensure all conflicts are resolved
git diff --name-only --diff-filter=U

# If no conflicts, try to continue
git merge --continue
```

### 2. **Lost Changes After Conflict Resolution**
```bash
# Check reflog for lost commits
git reflog

# Recover lost changes
git cherry-pick <commit-hash>
```

### 3. **Complex Conflicts**
- Break down complex conflicts into smaller parts
- Resolve one section at a time
- Test after each resolution
- Consider using a merge tool for complex files

## Documentation Updates

After resolving conflicts:
1. Update relevant documentation
2. Note any significant changes
3. Update troubleshooting guides if needed
4. Share lessons learned with the team

## Links to Related Documentation

- [Code Quality Standards](../code-quality.md)
- [Filament Best Practices](../filament-best-practices.md)
- [Testing Guidelines](../testing.md)
- [Migration Standards](../migration-standards.md)

---

*Git Conflicts Resolution Guide - Maintaining Code Quality Through Conflict Resolution*
